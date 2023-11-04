<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\WakalaRegister;
use App\Models\SalesBook;
use App\Models\CustomerAccounts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class WakalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->User_id;
        $wakala_profile = WakalaRegister::where('User_id',$user_id)->first();
     
        return view('dashboard',compact('wakala_profile'));
    }

    public function create_local_customer(Request $request)
    {
        $user_id = Auth::user()->User_id;
        $wakala_profile = WakalaRegister::where('User_id',$user_id)->first();
        $wakala = $wakala_profile->json();
        $simu = $request->simu;
        $jina = $request->jina;
        $pwd = $request->pwd;
        $email= $request->email;

           $response = Http::post('https://api.loanpage.co.tz/signup',[
                "phone"=>$simu,
                "name"=>$jina,
                "pwd"=>$pwd,
                "email"=>$email,
            ]);
            if($response){
                $status='ok';
            }
          else{
           // echo 'Message: server failed to add new custoemer because of incomplete info';
            $error='found';
        }
    
        return response()->json(['status'=>$status,
        'error'=>$error,
        ]);
    }
    
Public function generate_customerid($size)
{
    $alpha_key ='HB-CST-';
    $keys = range('0', '9');

    for ($i = 0; $i < 2; $i++)
    {
      $alpha_key .= $keys[array_rand($keys)];

    }
    $length = $size - 2;

    $key = '';
    $keys = range(0, 9);

    for ($i = 0; $i < $length; $i++) {
      $key .= $keys[array_rand($keys)];
    }

    return $alpha_key . $key;
        return $test;

}

 
   
}
