<?php

namespace App\Http\Controllers\Busniss\Auth;

use App\Busniss;
use App\Diserict;
use App\Labs;
use App\Pharmcy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new admins as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('busniss.guest:busniss');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:busnisses',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Busniss
     */
    protected function create(array $data)
    {
        return Busniss::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        // return view('busniss.auth.register');
        return"wwwwww";
    }


    public function register()
    {
        
        $check=Busniss::where('email', request()->email )->first();
        if (isset($check)) {
            redirect($this->redirectTo);
        }else{
      $busniss= new Busniss;
      $busniss->name=\request()->name;
      $busniss->password=\request()->password;
      $busniss->email=\request()->email;
        

        switch (\request()->type) {
            case 'Labs':
              $busniss->type="lab";
              $busniss->save();
              $diserict= Diserict::all();
             return  \view("busniss/layouts/lab/register_lab")
             ->with('busniss_id',$busniss->id )
             ->with('diserict',$diserict)
             ->with('busniss_name',$busniss->name ); 
             break;
            

                        
            case 'Hosptal':
              $busniss->type="hospital";
              $busniss->save();
              $diserict= Diserict::all();
             return  \view("busniss/layouts/hosptals/register_hosptals")
             ->with('busniss_id',$busniss->id )
             ->with('diserict',$diserict)
             ->with('busniss_name',$busniss->name );
             break;
              


            case 'Pharmcy':
             $busniss->type="pharmacie";
             $busniss->save();
             $diserict= Diserict::all();
             return  \view("busniss/layouts/pharmcies/register_pharmcies")
             ->with('busniss_id',$busniss->id )
             ->with('diserict',$diserict)
             ->with('busniss_name',$busniss->name );
                        break;
            
            default:
             return  \view("");
                        break; 
        }
    }
    }



    
    public function register_pharmacie()
    {
        $pharmcy= new Pharmcy;
        $pharmcy->busnisses_id=request()->busnisses_id;
        $pharmcy->descrbtion=request()->descrbtion;
        $pharmcy->usernmae=request()->usernmae;
        $pharmcy->number=request()->number;
        $pharmcy->opning_time=request()->opning_time;
        $pharmcy->closing_time=request()->closing_time;
        $pharmcy->disericts_id =request()->diserict;
        $pharmcy->photo=request()->photo->store('img','public');
        $pharmcy->lincese=request()->lincese->store('img/pharmcy/lincese','public');
        $pharmcy->save();
        $business = Busniss::find($pharmcy->busnisses_id);
        Auth::guard('busniss')->login($business);
        return \view('busniss/layouts/pharmcies/pharmcies_index')->with('pharmcy',$pharmcy);
    
    }
    public function register_lab()
    {
        $lab= new Labs;
        $lab->busnisses_id=request()->busnisses_id;
        $lab->descrbtion=request()->descrbtion;
        $lab->usernmae=request()->usernmae;
        $lab->number=request()->number;
        $lab->opning_time=request()->opning_time;
        $lab->closing_time=request()->closing_time;
        $lab->disericts_id =request()->diserict;
        $lab->photo=request()->photo->store('img/lab/','public');
        $lab->lincese=request()->lincese->store('img/lab/lincese','public');
        $lab->save();
        $business = Busniss::find($lab->busnisses_id);
        Auth::guard('busniss')->login($business);
        return \view('busniss/layouts/lab/lab_index')->with('lab',$lab);
    
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
       
        
        return Auth::guard('busniss');
    }

}
