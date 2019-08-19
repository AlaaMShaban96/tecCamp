<?php

namespace App\Http\Controllers\Busniss\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Busniss;
use App\Pharmcy;

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
    protected $redirectTo = '/busniss';
   

    /**
     * Create a new controller instance. 
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('busniss.guest:busniss', ['except' => 'logout']);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('busniss');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('busniss.auth.login');
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {

        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect($this->redirectTo);
    }

    public function login()
    {
       $business=  Busniss::where('email', request()->email)->first();
   
    
      try {
         
    if ($business->password ==request()->password) {
        
    
      
       switch ($business->type) {
           case 'Labs':
               # code...
               break;
           
           case 'Hosptal':
               # code...
               break;
           
           case 'pharmacie':
           $pharmcy= Pharmcy::where('busnisses_id',$business->id)->first();
          // dd($pharmcy);

          Auth::guard('busniss')->login($business);
        
           return  \view("busniss/layouts/pharmcies/pharmcies_index")->with('pharmcy',$pharmcy );
        //    return redirect()->action('${busniss/layouts/pharmcies/pharmcies_index}', 
        //    ['pharmcy' => $pharmcy]);

               break;
           
           
       }
    }else {
        
         throw $error;
    }

    } catch (\Throwable $th) {
        $error = \Illuminate\Validation\ValidationException::withMessages([
            'email' => ['this email not true'],
            'password' => ['this password not true'],

            
           
         ]);
         throw $error;
       }
    
    }

    public function redirectTo()
    {
        dd(auth('busnis')->user());
        // if (auth('busnis')->user()->type == "pharmacy") {
        //     return 'busnis/pharmacy';
        // }

        // return 'busnis';
        // return redirect()->action('${App\Http\Controllers\HomeController@index}', ['parameterKey' => 'value']);
    }

}