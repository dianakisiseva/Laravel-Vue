<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\UserNotFoundException;
use App\Exceptions\WrongPasswordException;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\isEmpty;

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


    public function login(Request $request)
    {
        try {
            $credentials = $request->only(['email', 'password']);
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                throw new UserNotFoundException();
            }

            if (!Hash::check($credentials['password'], $user->password)) {
                throw new WrongPasswordException();
            }

            if ($this->attemptLogin($request)) {
                $this->sendLoginResponse($request);
            }

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'user'   => 'Unauthorized Access',
                'errors' =>  $e->getMessage()
            ]);

        }
        $this->clearLoginAttempts($request);

        return response()->json([
            'status'   => 'success',
            'user' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
