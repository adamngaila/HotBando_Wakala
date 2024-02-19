<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\vifurushi;
use App\Models\VifurushiTransaction;
use App\Models\VifurushiWallet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class VifurushiController extends Controller
{
    public function getKifurushiPrice($kifurushiId) {


        $kifurushi = vifurushi::find($kifurushiId);
        if ($kifurushi) {
            return response()->json(['price' => $kifurushi->amount]);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
    public function initialize_kifurushi_purchase($Id,$Tcode,$Amount){
        $url = 'https://api.loanpage.co.tz/buyPackageWakala?Id=';
        $url.=$Id;
        $url.="&TCode=";
        $url.=$Tcode;
        $url.="&Amount=";
        $url.=$Amount;

        $response = http::POST($url);

        if ($response)
        {
          
            $data = $response->json();
            $jibu = [
              'status'=>$data['done'],
              'payment_url'=>$data['redirect_url'],
              
          ];
            return  $jibu;
  
        }else{
        
        $jibu = ['status'=>false,];
          return $jibu;
    }

    }
    Public function purchase_kifurushi_process(Request $request){
        $request->validate([
            'qty' => ['required']
        ]);
        $Id = $request->user_id;
        $Tcode = $this->generate_transactioncode(8);
        $Amount = $request->price*$request->qty;
        if($Amount >= $request->price)
        {
         $response_url = $this->nitialize_kifurushi_purchase($Id,$Tcode,$Amount);
         if($response_url['status'] == true){
            $vifurushi_T = VifurushiTransaction::create([
                'Transaction_id'=>$Tcode,
                'Wakala_code'=> $Id,
                'Transaction_type'=>"Purchase",
                'Value'=> $request->value,
                'Amount'=> $Amount,
                'kifurushi_id'=>$request->vifurushi_list,
                'Transaction_status'=>"Successiful",
            ]);
            return response()->json(['status'=>'good',
            'tcode'=>$Tcode,
            'package'=>$request->value,
             'redirect_url'=>$response_url['payment_url'],
        ]);

          
         }else{
            return response()->json(['status'=> 'bad',
            'tcode'=>$Tcode,
        ]);
           }
        }

    }

    Public function generate_transactioncode($size)
{
    $alpha_key ='HBVFR';
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

 /* $vifurushi_W = VifurushiWallet::where('Wakala_code',$Id)->update([
                'Purchased_vifurushi',
                'Sold_vifurushi',
                'Credit_vifurushi',
                'Vifurushi_balance',
                'Offer_Vifurushi',
                'expiredate',
                'kifurushi_id',
            ]);
            */

}
