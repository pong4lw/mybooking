<?php

namespace App\Http\Controllers\Admin\Auth;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Admin\Auth; 
use App\Http\Controllers\Admin\Controller; 
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Admin;
class LoginController extends BaseController
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
    protected $redirectTo = '/admin/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('admin.auth.login'); //管理者ログインページのテンプレート
    }

    public function login(Request $request)
    {
       $user = Admin::where('email',$request->email)->first();

        if(Hash::check($request->password, $user['password'])){       
           \Auth::loginUsingId($user['id']);
            return redirect('/admin/index');
        }
        return redirect()->back();
    }

    protected function guard()
    {
        return \Auth::guard('admin'); //管理者認証のguardを指定
    }

    public function logout(Request $request)
    {
        \Auth::logout();
        $this->guard()->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('/admin/login');  
    }
    protected function credentials(Request $request)
    {
        $temporary = $request->only($this->username(), 'password');
//        $temporary['shop_id'] = $request->shop_id;
        return $temporary;
    }

    public function authenticate(Request $request) 
    {
        $email = $request->email;
        $password = $request->password;
        if (\Auth::validate(['email' => $email, 'password' => $password]))
        {
            $user = Admin::where('email', $email)->first();
            \Auth::loginUsingId($user->id);
            return redirect('/admin/index');
        }
        return redirect()->back();
    }
}
