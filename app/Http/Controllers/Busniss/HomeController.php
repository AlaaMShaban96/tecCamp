<?php

namespace App\Http\Controllers\Busniss;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Pharmcy;

class HomeController extends Controller
{

    protected $redirectTo = '/busniss/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('busniss.auth:busniss');
    }

    /**
     * Show the Busniss dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        switch (Auth::guard('busniss')->user()->type) {
            case 'pharmacie':
            $pharmcy= Pharmcy::where('busnisses_id',Auth::guard('busniss')->user()->id)->first();
             return  \view("busniss/layouts/pharmcies/pharmcies_index")->with('pharmcy',$pharmcy );
                break;
            
            default:
                # code...
                break;
        }
    }

}