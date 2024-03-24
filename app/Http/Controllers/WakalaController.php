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
use App\Models\vifurushi;
use App\Models\Transactions;
use App\Models\VifurushiTransaction;
use App\Models\VifurushiWallet;
use App\Models\CustomerAccounts;
use App\Models\voucher;
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

        $wallet = VifurushiWallet::where('Wakala_code',$wakala_profile->Wakala_code)->first();
        $balance = $wallet->Vifurushi_balance;
        $customers_count = CustomerAccounts::where('Wakala_code',$wakala_profile->Wakala_code)->count();
        $mauzo = SalesBook::where('Wakala_code',$wakala_profile->Wakala_code)->sum('Amount');
        $mapato = Transactions::where('Wakala_code',$wakala_profile->Wakala_code)->sum('Commission');

     
        return view('wakalaViews.dashboard',compact('wakala_profile','customers_count','mauzo','mapato','balance'));
    }
    public function show_customers(){
        
        $user_id = Auth::user()->User_id;
        $wakala_profile = WakalaRegister::where('User_id',$user_id)->first();
        $customers = CustomerAccounts::where('Wakala_code',$wakala_profile->Wakala_code)->get();
        return view('wakalaViews.wateja',compact('customers','wakala_profile'));
    }

    public function show_mauzo(){
        
        $user_id = Auth::user()->User_id;
        $wakala_profile = WakalaRegister::where('User_id',$user_id)->first();
        $mauzo = SalesBook::where('Wakala_code',$wakala_profile->Wakala_code)->get();
        return view('wakalaViews.mauzo',compact('mauzo','wakala_profile'));
    }

    public function create_local_customer(Request $request)
    {
        $user_id = Auth::user()->User_id;
       // $wakala_profile = WakalaRegister::where('User_id',$user_id)->first();
        $wakala = $request->wakala_code;
        $simu = $request->simu;
        $jina = $request->jina;
        $pwd = $request->pwd;
        $email= $request->email;
        $error =null;

           $response = Http::post('https://api.hotbando.tech/signup',[
                "phone"=>$simu,
                "name"=>$jina,
                "pwd"=>$pwd,
                "email"=>$email,
                "wakala"=>$wakala,
            ]);
            $responses = $response->json();
            if($responses['done']){
                $status='ok';
            }
          else{
           // echo 'Message: server failed to add new custoemer because of incomplete info';
           $status= $responses;
        }
    
        return response()->json(['status'=>$status,
        'error'=>$error,
        ]);
    }


    public function show_vifurushi(){
        
        $user_id = Auth::user()->User_id;
        $wakala_profile = WakalaRegister::where('User_id',$user_id)->first();
        $vifurushi_list = vifurushi::where('target_user','Wakala')->where('status','Active')->get();
       $vifurushi_miamala = VifurushiTransaction::where('Wakala_code',$wakala_profile->Wakala_code)->get();
       $vifurushi_wallet = VifurushiWallet::where('Wakala_code',$wakala_profile->Wakala_code)->get();
       return view('wakalaViews.vifurushi',compact('wakala_profile','vifurushi_list','vifurushi_miamala','vifurushi_wallet'));
    }
    public function show_vocha(){
        $user_id = Auth::user()->User_id;
        
        $wakala_profile = WakalaRegister::where('User_id',$user_id)->first();
        $vocha_details = $this->getLatestBatchInfo($wakala_profile->Wakala_code);
       $vocha_miamala = VifurushiTransaction::where('Wakala_code',$wakala_profile->Wakala_code)->where('Transaction_type','Purchase_Vocha')->get();
       $vifurushi_wallet = VifurushiWallet::where('Wakala_code',$wakala_profile->Wakala_code)->get();
       return view('wakalaViews.vocha',compact('wakala_profile','vocha_miamala','vocha_details'));
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
public function getLatestBatchInfo($wakala_code)
{
    // Select the latest batch_id and count of data
    $latestBatchInfo = voucher::select('batch_id', DB::raw('count(*) as count'), DB::raw('MAX(voucher_value) as voucher_value'))
        ->where('wakala_code',$wakala_code)
        ->groupBy('batch_id')
        ->orderBy('voucher_id', 'desc')
        ->first(); // Get the first result

    return $latestBatchInfo;
}
   
}
