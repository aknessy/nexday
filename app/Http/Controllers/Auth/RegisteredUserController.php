<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Mail;

use App\Exceptions\MethodNotAllowedHttpException;

use App\Models\User;
use App\Models\Origin;
use App\Models\Country;
use App\Mail\AccountCreated;


class RegisteredUserController extends Controller
{
    /**
     * Class Constructor
     * @return void
     */
    public function __construct(){
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index(Request $request)
    {           
        return view('register',
            [
                'countries' => Country::all()
            ]
        );
    }

    /**
     * Process Basic User Information submission
     * 
     * @param \Ilumunate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * 
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ProcessBasicForm(Request $request)
    {
        if($request->isMethod('post')){
            $request->validate([
                'firstname' => ['required', 'string', 'max:80'],
                'middlename' => ['nullable', 'string', 'max:80'],
                'lastname' => ['required', 'string', 'max:80'],
                'gender' => ['nullable', 'string'],
                'phonenumber' => 'sometimes|required|min:10|max:14',
                'address' => 'required|string',
                'state' => 'sometimes|required|string',
                'city' => 'sometimes|required|string',
                'country' => 'sometimes|required|string',
                'email' => 'required|string|email|max:255|unique:users',
                'dateofbirth' => 'required|string',
                'usercategory' => 'required|string',
            ]);
            
            $request->session()->forget('basicInformation');

            $request->session()->put('basicInformation', [
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'gender' => $request->gender,
                'phonenumber' => $request->phonenumber,
                'address' => $request->address,
                'state' => $request->state,
                'city' => $request->province,
                'country' => $request->country,
                'dateofbirth' =>$request->dateofbirth,
                'usertype' => $request->usercategory,
                'email' => $request->email,
            ]);

            return redirect('register/location');
        }else{
            $request->session()->flash(
                [
                    'registrationProgressStatusCode' => 0,
                    'registrationProgressStatusMessage' => 'New users must provide their `Basic Information`!'
                ]);

            return back()->withInput();
        }
    }

    /**
     * Handle an incoming registration request for users longitude and latitudes.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function location(Request $request)
    {
        if(!$request->session()->has('basicInformation'))
            return redirect('register');
        
        return view('location');

    }

    /**
     * Process User Location Information submission
     * 
     * @param \Ilumunate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * 
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ProcessLocationForm(Request $request)
    {
        if($request->isMethod('post'))
        {
            $request->validate([
                'lngLatInputField' => 'required|json', 'Location must be in longitude & Latitude!'
            ]);

            $request->session()->push('basicInformation.longitudeLatitude', $request->lngLatInputField);
            
            return redirect('register/terms');

        }else
            return redirect('register/location')->with(
            [
                'registrationProgressStatusCode' => 0,
                'registrationProgressStatusMessage' => 'New users must provide their basic information!'
            ]);
        
    }

    /**
     * Terms and conditions of service
     * 
     * @return \Illuminate\View\View
     */
    public function terms(Request $request)
    {
        if(!session('basicInformation')['longitudeLatitude'])
            return redirect('register/location');

        return view('terms-conditions');
    }

     /**
     * ProcessTerms & Conditions of service form
     * 
     * @param \Ilumunate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * 
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ProcessTermsForm(Request $request)
    {
        if($request->isMethod('post'))
        {
            $request->validate([
                'terms' => 'required|string'
            ]);

            $request->session()->push('basicInformation.terms', $request->terms == 'on' ? 1 : 0);
            
            return redirect('register/store');
        }else
           return redirect('register/location')->with(
            [
                'registrationProgressStatusCode' => 0,
                'registrationProgressStatusMessage' => 'Access to requested resource is restricted! Please follow due process!!'
            ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if($request->session()->has('basicInformation'))
        {
            $data = $request->session()->all();

            $generatedPassword = GenerateRandom(8);
            $requestDateOfBirth = $data['basicInformation']['dateofbirth'];
            $dateOfBirthConvert = strtotime($requestDateOfBirth);

            $verifyTokenString = GenerateRandom(mt_rand(15,30));
            
            $user = User::Create(
                [
                    /**
                     * Generate a 10 digit unique random string for the current user
                     */
                    
                    'userUnique' => GenerateRandom(10),
                    'firstname' => $data['basicInformation']['firstname'],
                    'middlename' => $data['basicInformation']['middlename'],
                    'lastname' => $data['basicInformation']['lastname'],
                    'gender' => $data['basicInformation']['gender'],
                    'address' => $data['basicInformation']['address'],
                    'phone' => $data['basicInformation']['phonenumber'],
                    'email' => $data['basicInformation']['email'],
                    'dateofbirth' => $dateOfBirthConvert,
                    'usertype' => $data['basicInformation']['usertype'],
                    'state' => $data['basicInformation']['state'],
                    'city' => $data['basicInformation']['city'],
                    'country' => $data['basicInformation']['country'],
                    
                    /**
                     * A JSON object representing the users current location in longitude and latitude
                     */
                    'gps_location' => json_encode($data['basicInformation']['longitudeLatitude']),

                    /**
                     * When a user shares his/her location (Coordinates in Longitude/Latitude), this user is automatically assigned and `autodot` designation.
                     * An autodot is a special user with the privilege of being given special duties like verification of the condition of an order or
                     * inspection of a property or apartment. Autodots have/stand a chance to be paid when carrying out assigned duties.
                     */
                    'autodot' => isset($data['basicInformation']['longitudeLatitude']) ? 1 : 0,
                    
                    /**
                     * There should be three statuses
                     * 1. 0 - which represents an inactive user
                     * 2. 1 - which represents an active user (one who has passed verification)
                     * 3. 2 - which represents a user whose account is under review (Every newly created account belongs in this category)
                     */
                    'status' => 2,
                    
                    /**
                     * 1 Indicates that the account is under review
                     * 0 indicates the opposite
                     */
                    'under_review' => 1,
                    
                    /**
                     * 1 indicates that the user is suspended (every suspended user cannot login or make use of their account)
                     * 0 indicates that the account is not under a suspension/ban
                     */
                    'suspended' => 0,
                    
                    /**
                     * Create a hash of the generated password string.
                     * This is what will store in the DB and the unhashed string will be sent to the user.
                     */
                    'password' => Hash::make($generatedPassword),

                    /**
                     * Plain text password. This is unsafe and will be used for testing purposes ONLY.
                     */
                    'password_text' => $generatedPassword,

                    /**
                     * Token used to build the email verification link
                     */
                    'email_verify_token' => $verifyTokenString
                ]
            );

            /**
             * Check for changes to the User Model attributes assigned above.
             */
            if($user)
            {
                /**
                 * Send a welcome mail to the newly created user with their login email & the generated password.
                 */
                Mail::to($user->email)->send(new AccountCreated($user, $generatedPassword));
                
                $request->session()->forget('basicInformation');
                return redirect('register/success');
            }
        
            // event(new Registered($user));

            return redirect('register/fail');
        }else
            return redirect('register')->with(
                [
                    'registrationProgressStatusCode' => 0,
                    'registrationProgressStatusMessage' => 'An error occurred. Please make sure to provide your `Basic Information` then try again!'
                ]);
    }

    /**
     * Indicates a successful account creation
     * 
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function AccountCreatedSuccess(Request $request)
    {
        return view('register-success');
    }

    /**
     * Indicates a successful account creation
     * 
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function AccountCreatedFail(Request $request)
    {
        return view('register-fail');
    }

    /**
     * Fetch States associated with the given country
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param string $country
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function FetchOriginStates(Request $request, $countryCode)
    {
        $originCities = Origin::where('country_code', $countryCode)->get();
        $toArray = $originCities->toArray();
        $statesWithCodes['names'] = [];
        $statesWithCodes['codes'] = [];

        foreach($toArray as $item => $value){
            array_push($statesWithCodes['names'], $value['states']);
            array_push($statesWithCodes['codes'], $value['code']);
        }

        return $statesWithCodes;
    }

    /**
     * Fetch LGAs associated with the given State
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param string $statecode
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function FetchOriginProvinces(Request $request, $stateCode)
    {
        $originLgas = Origin::where('code', $stateCode)->value('lgas');
        return json_decode($originLgas, true);
    }

    /**
     * Verify the user's email address
     * 
     * @param \Illuminate\Http\Request $request
     * @param string $token
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function ConfirmAccountEmail(Request $request, $token)
    {
        /**
         * 1. Verify the user's email address by setting the `is_email_verified` table column to `true`
         * 2. Set the `email_verified_at` column to the current time/date
         */
        $userWithToken = User::where('email_verify_token', $token)->get();
        
        if($userWithToken->id)
        {

        }
    }

}
