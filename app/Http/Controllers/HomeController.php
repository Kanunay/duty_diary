<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    if (Auth::check()) {
        $totalUsers = User::count(); // Get the count of users
        
        $userName = Auth::user()->name;
        $userRole = Auth::user()->role_id;
        $userImg = Auth::user()->img;
        $userSign = Auth::user()->sign;
        
        Session::put('USERNAME', $userName);
        Session::put('USERROLE', $userRole);
        Session::put('USERIMG', $userImg);
        Session::put('USERSIGN', $userSign);

        $errorMessages = [];

        if (Auth::user()->isPassChanged == 0) {
            $errorMessages[] = 'Please update your password!';
        }

        if (Auth::user()->isPicComplete == 0) {
            $errorMessages[] = 'Please upload your profile picture!';
        }

        if (Auth::user()->isSignatureComplete == 0 && !Auth::user()->role_id == 3) {
            $errorMessages[] = 'Please upload your signature! Make sure it has a transparent background.';
        }

        if (!empty($errorMessages)) {
            $errorMessage = '<ul>';
            foreach ($errorMessages as $message) {
                $errorMessage .= '<li>' . $message . '</li>';
            }
            $errorMessage .= '</ul>';

            $profile = User::where('id','=',Auth::user()->id)->first();
            return view('admin.diaries.index')->with([
                'totalUsers' => $totalUsers,
                'error' => $errorMessage,
                'profile' => $profile
            ]);
        }
        
        return view('home')->with(compact('totalUsers'));
    }

    return view('home')->with(compact('totalUsers'));
}

}
