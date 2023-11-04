<?php

namespace App\Http\Controllers;
use App\Models\WakalaRegister;
use App\Models\SalesBook;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verify_customer($request){
      $url = 'https://api.loanpage.co.tz/verifyUser?phone=';
      $url .= $request;

      $response = Http::get($url);
      if ($response == 'null')
      {
        
      $jibu = ['status'=>false,];
        return $jibu;

      }else{
      $data = $response->json();
      $jibu = [
        'status'=>true,
        'phone'=>$data['username'],
        'id'=>$data['.id'],
    ];
      return  $jibu;
  }
  }
  public function create_bando_profile($id,$amount){
    $url = 'https://api.loanpage.co.tz/addProfile';
    $pesa = (int)$amount;
   
    $response = Http::post('https://api.loanpage.co.tz/addProfile',[
      'id'=>$id,
      'amount'=>$pesa
  ]);

    if($response == "transaction sucessed" )
    {
      return "user verified and profile added";
    }else{
      return "failed to add profile";
    }

  }
     
    public function make_sales(Request $request)
    {
        
        $user_id = Auth::user()->User_id;
        $wakala_code =DB::table('wakala_registers')->where('User_id', $user_id)->pluck('Wakala_code');
        
        $verify_local = $this->verify_customer($request->Customer_phone);

        if(Auth::user()->Usertype == 'Wakala')
    {
      if( $verify_local['status']){
        $wakala_code = WakalaRegister::where('User_id', $user_id)->pluck('Wakala_code');
        $wakala_commission= WakalaRegister::where('User_id', $user_id)->pluck('Wakala_commission');
        $sales_code = $this->generate_salescode(3);
        $trans_code = $this->generate_transactioncode(3);
        $request->validate([
            'Customer_phone' =>  ['required', 'string', 'max:10','min:10'],
            'vifurushi' =>  ['required', ],
            'Amount' =>  ['required',],
            
        ]);
        $package_value = $request->vifurushi;
        if($request->Amount >= $package_value)
        {
            $sales = SalesBook::create([
            'Wakala_code'=> $wakala_code,
            'Sales_id'=> $sales_code,
            'Customer_id'=> $request->customer_id,
            'Customer_phone'=>$request->Customer_phone,
            'Package_type'=> $request->vifurushi,
            'Amount'=> $request->Amount,
            'Payment_Type'=> $request->payment,
            'Authorization_Status'=> $request->approve,
            ]);
            $Commission = 0.1*$request->Amount;
        $wakala_transaction = Transactions::create([
         'Wakala_code'=> $wakala_code,
        'Customer_id'=>$request->Customer_phone,
        'Transaction_id'=> $trans_code,
        'Sales_id'=> $sales_code,
        'transaction_type'=> $request->payment,
        'Credit'=>'0',
        'Cash'=> $request->Amount,
        'Amount'=>$request->Amount,
        'Commission'=>$Commission,
        'transaction_status'=> $request->approve,
        ]);
        }
    
    $sum_mauzo = Transactions::where('Wakala_code',$wakala_code[0])->sum('Cash');
    $sum_wakala_gawio = Transactions::where('Wakala_code',$wakala_code[0])->sum('Commission');
    WakalaRegister::where('Wakala_code',$wakala_code)->update([
        'Jumla_mauzo'=>$sum_mauzo,
        'wakala_mapato'=>$sum_wakala_gawio,
    ]);
    $id = $verify_local['id'];

    $add_profile = $this->create_bando_profile( $id,$request->vifurushi);
    $add_p = $add_profile;
   // return redirect('dashboard');
   return response()->json(['success'=> $add_p ]);
   }else{
    return response()->json(['success'=> 'failed to sell ,customer not found in database']);
   }
  }
}

Public function generate_salescode($size)
{
    $alpha_key ='HB-SLC-';
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
Public function generate_transactioncode($size)
{
    $alpha_key ='HB-SLC-';
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