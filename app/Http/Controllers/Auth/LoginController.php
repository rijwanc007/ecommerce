<?php

namespace App\Http\Controllers\Auth;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller{
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

    use RedirectsUsers, ThrottlesLogins;
    protected $redirectTo = 'dashboard';
    private $user_menu;
    private $user_permission;
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm(){
        return view('auth.login');
    }
    public function login(Request $request){
        $this->validateLogin($request);
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }
    protected function validateLogin(Request $request){
        $request->validate([
            $this->username() => 'required|string|max:30',
            'password' => 'required|string|min:8|max:30',
        ]);
    }
    protected function attemptLogin(Request $request){
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }
    protected function credentials(Request $request){
        return $request->only($this->username(), 'password');
    }
    protected function sendLoginResponse(Request $request){
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);
        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }
        return $request->wantsJson() ? new JsonResponse([], 204) : redirect()->intended($this->redirectPath());
    }
    protected function authenticated(Request $request, $user){
        if($user->status == 2){
            $this->guard()->logout();
            return back()->with('error', 'Your account is disabled. Please contact with admin to enable account.');
        }else{
            $role_id = auth()->user()->role_id;
            $menus   = Module::doesntHave('parent')->orderBy('order','asc')->with('children');
            $permissions = Permission::join('modules','permissions.module_id','=','modules.id')->where('modules.menu_id',1)->select('slug');
            if($role_id != 1){
                $menus->whereHas('module_role', function($q) use ($role_id){
                    $q->where('role_id',$role_id);
                });
                $permissions->whereHas('permission_role', function($q) use ($role_id){
                    $q->where('role_id',$role_id);
                });
            }
            $this->user_menu = $menus->where('menu_id',1)->get(); //permitted module list
            $this->user_permission = $permissions->get(); //permitted method list
            if(!$this->user_menu->isEmpty()){
                Session::put('user_menu',$this->user_menu); //permitted modules putted into session
            }
            $permissions = [];
            if(!$this->user_permission->isEmpty()){
                foreach ($this->user_permission as $value) {
                    array_push($permissions,$value->slug);
                }
                Session::put('user_permission',$permissions); //permitted methods putted into session
            }
        }
    }
    protected function sendFailedLoginResponse(Request $request){
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }
    public function username(){
        return 'username';
    }
    public function logout(Request $request){
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        if ($response = $this->loggedOut($request)) {
            return $response;
        }
        return $request->wantsJson() ? new JsonResponse([], 204) : redirect('login');
    }
    protected function loggedOut(Request $request){
        //
    }
    protected function guard(){
        return Auth::guard();
    }
}
