<?php


use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/php', function () {
    return response()->json([
    'stuff' => phpinfo()
   ]);
});

/**
 * Routes with the block() method chained to them prevents concurrently processing/submission of forms to the named routes
 * until the first request is completed (after 10 seconds)
 */
Route::get('register', [RegisteredUserController::class, 'index'])->name('register');
Route::post('register/process-basic', [RegisteredUserController::class, 'ProcessBasicForm'])->name('process-basic')->block();
Route::get('register/location', [RegisteredUserController::class, 'location']);
Route::post('register/process-location', [RegisteredUserController::class, 'ProcessLocationForm'])->name('process-location')->block();
Route::get('register/terms', [RegisteredUserController::class, 'terms']);
Route::post('register/process-terms', [RegisteredUserController::class, 'ProcessTermsForm'])->name('process-terms')->block();
Route::get('register/store', [RegisteredUserController::class, 'store']);
Route::get('register/verify-email/{token}', [RegisteredUserController::class, 'ConfirmAccountEmail']);
Route::get('register/success', [RegisteredUserController::Class, 'AccountCreatedSuccess']);
Route::get('register/fail', [RegisteredUserController::class, 'AccountCreatedFail']);

Route::get('register/fetchStates/{countryCode}', [RegisteredUserController::class, 'FetchOriginStates']);
Route::get('register/fetchProvinces/{stateCode}', [RegisteredUserController::class, 'FetchOriginProvinces']);

Route::get('register/verify', function(){
    return view('emails.account-created')->with(['email'=>'test@example.com','accountPassword'=>'secret1234','verifyToken'=>'3ewr3r4wrw']);
});

require __DIR__.'/auth.php';
