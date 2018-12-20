<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Cookie;
use DB;
use Log;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->guzzle = new \GuzzleHttp\Client([
            'base_uri' => env('AUTH_SERVICE_URL')
        ]);
    }

    public function login(LoginRequest $request) 
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();

        $response = $this->guzzle->request('POST', '/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => env('PASSWORD_CLIENT_ID'),
                'client_secret' => env('PASSWORD_CLIENT_SECRET'),
                'username' => $email,
                'password' => $password,
                'scope' => '*'
            ],
        ]);

        $status = $response->getStatusCode();
        
        if ($status != 200) {
            return back()->with('message', 'Sorry, something went wrong. Please try again.');
        }

        Auth::login($user);

        return view('recipe.index');
    }

    public function logout()
    {
        $tokens = Auth::user()->tokens;

        try {
            foreach ($tokens as $token) {
                DB::table('oauth_refresh_tokens')
                ->where('access_token_id', $token->id)
                ->update([
                    'revoked' => true
                    ]
                );
                
                $token->revoke();
            }
        } catch (\Exception $e) {
            Log::error('Revoke failed', ['mesage' => $e->getMessage()]);
            return back()->with('message', 'Sorry, something went wrong. Please try again.');
        }

        Auth::logout();

        return view('home');
    }
}
