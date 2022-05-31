<?php

namespace App\Http\Controllers\Auth;
// 追加
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // 追加箇所
    public function redirectToProvider(Request $request) {

        $provider = $request->provider;
        return Socialite::driver($provider)->redirect();

    }
    //　追加箇所
    public function handleProviderCallback(Request $request) {

        $provider = $request->provider;
        $social_user = Socialite::driver($provider)->user();
        $social_email = $social_user->getEmail();
        $social_name = $social_user->getName();

        if(!is_null($social_email)) {

            $user = User::firstOrCreate([
                'email' => $social_email
            ], [
                'email' => $social_email,
                'name' => $social_name,
                'password' => Hash::make(Str::random())
            ]);

            auth()->login($user);
            return redirect('/dashboard');

        }
        return '必要な情報が取得できていません。';

    }
}
