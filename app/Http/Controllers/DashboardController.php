<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Define a variable for the current page. This is used by the sidebarLeft component to identify
     * what page the user is currently viewing.
     * 
     * @var string
     */
    public $currentPage;
    
    /**
     * Class Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->currentPage = 'dashboard';
    }
    /**
     * Displays the dashboard welcome page
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $timeOfCreation = $user->created_at;
        $timeago = TimeAgo(strtotime($timeOfCreation));
        
        $usersCount = count(User::all());

        return view('dashboard', [
                'currentPage' => $this->currentPage,
                'timeago' => $timeago,
                'totalUsers' => $usersCount
            ]);
    }

}
