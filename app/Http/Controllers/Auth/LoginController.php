<?php

namespace App\Http\Controllers\Auth;

use Socialite;

use App\Models\User;
use App\Models\Setting;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use function GuzzleHttp\json_encode;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function initializeLoginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function completeLoginWithGoogle(Request $request)
    {
        try {
            $user = Socialite::driver('google')->user();
            $userProfile = User::where('email', $user->email)->first();
            if (!$userProfile) {
                session()->flash('auth-fail', 'You are not authorized to proceed!');
                return redirect('/login');
            }
            Setting::where('id', 1)->update(['google_token' => $user->token]);
            auth()->loginUsingId($userProfile->id);
            return redirect('/');
        } catch (Exception $e) {
            return redirect('/login');
        }

        // check if code is valid

        // if code is provided get user data and sign in
        // if (!is_null($code)) {
        //     // This was a callback request from google, get the token
        //     $token = $googleService->requestAccessToken($code);

        //     // Send a request with it
        //     $result = json_decode($googleService->request('https://www.googleapis.com/oauth2/v1/userinfo'), true);

        //     $email = $result['email'];

        //     if (Route::currentRouteName() == "pull_request") {
        //         if ($email != "lindaikeji@gmail.com") {
        //             session()->flash('alert-danger', 'You are using the wrong email address to access blogger ' . $email . " rather than lindaikeji@gmail.com");
        //             return redirect()->to('/settings');
        //         }
        //     }


        //     $message = 'Your unique Google user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
        //     //save the your blog token on the platform
        //     Setting::where('id', '1')->update(['google_token' => $token->getAccessToken()]);

        //     $user = User::where('email', $email)->first();

        //     if ($user) {
        //         auth()->loginUsingId($user->id);
        //     }
        //     return redirect()->to('/auth/callback');
        // }
    }
}
