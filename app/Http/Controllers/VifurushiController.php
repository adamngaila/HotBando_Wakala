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
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\WakalaRegister;


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
    public function initialize_pesapay_purchase($Id,$Tcode,$Amount,$URL){
        //'https://api.hotbando.tech/buyPackageWakala';
        $url = $URL;

        $response = http::post($url,[
            'Id'=>$Id,
            'TCode'=>$Tcode,
            'Amount'=>$Amount,
        ]);

        if ($response)
        {
          
            $data = $response->json();
            $jibu = [
              'status'=> $data['done'],
              'payment_url'=> $data['redirect_url'],
              'order_tracking_id'=>$data['order_tracking_id'],
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
        $current = Carbon::now();
        $Tcode = $this->generate_transactioncode(7,'HBVFR');
        $Tcode.= $current;
        $Amount = $request->price*$request->qty;
        $URL ='https://api.hotbando.tech/buyPackageWakala';
      
        if($Amount >= $request->price)
        {
         $response_url = $this->initialize_pesapay_purchase($Id,$Tcode,$Amount,$URL);
         if($response_url['status'] == true){
            $trans_request_id = $response_url['order_tracking_id'];
            $vifurushi_T = VifurushiTransaction::create([
                'Transaction_id'=>$Tcode,
                'Wakala_code'=> $Id,
                'Transaction_type'=>"Purchase",
                'Value'=> $request->value,
                'Amount'=> $Amount,
                'kifurushi_id'=>$request->vifurushi_list,
                'Transaction_request_id'=> $trans_request_id,
                'Transaction_status'=>"Pending",

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

    public function verify_payments(Request $OrderTrackingId){
        //"call_back_url": "http://192.168.88.253/rensponse?OrderTrackingId=de51f26c-9438-4a6e-9b8a-de54c3bf7dca&OrderMerchantReference=1691489147-0613017308-1000",
        //https://api.hotbando.tech//verifyPayment?OrderTrackingId=d6611536-014f-4417-a802-dd8f4e5334de
        $url ="https://api.hotbando.tech//verifyPayment";
        $verify = http::get($url,[
            'OrderTrackingId'=>$OrderTrackingId->OrderTrackingId,
        ]);
        $payment_failed ="";
        $payment_success ="";

        $user_id = Auth::user()->User_id;
        $wakala_profile = WakalaRegister::where('User_id',$user_id)->first();
        $vifurushi_list = vifurushi::where('target_user','Wakala')->where('status','Active')->get();
       
        $status_code = $verify['status_code'];
        if($status_code == 1){
            $payment_success = "Malipo yamefanikiwa. Payments successiful!!";
            VifurushiTransaction::where('Transaction_request_id',$OrderTrackingId->OrderTrackingId)->update([
                'Transaction_status'=>"Success",
                'Transaction_reference'=>$verify['merchant_reference'],
            ]);
           
            
        }
        if($status_code == 0){
            $payment_failed = "Malipo hayajafanikiwa, jaribu tena. Payments failed try again later!!";
        }

        $sum_purchased_vifurushi = VifurushiTransaction::where('Transaction_status',"Success")
                                                            ->where('Transaction_type','Purchase')
                                                            ->where('Wakala_code',$wakala_profile->Wakala_code)
                                                            ->sum('Value');
             $sum_sold_vifurushi = VifurushiTransaction::where('Transaction_status',"Success")
                                                            ->where('Transaction_type','Sale')
                                                            ->where('Wakala_code',$wakala_profile->Wakala_code)
                                                            ->sum('Value');
            $balance = $sum_purchased_vifurushi - $sum_sold_vifurushi;

            VifurushiWallet::where('Wakala_code',$wakala_profile->Wakala_code)->update([
                'Purchased_vifurushi'=> $sum_purchased_vifurushi,
                'Sold_vifurushi'=>$sum_sold_vifurushi,
                'Vifurushi_balance'=>$balance,
            ]);
            $vifurushi_miamala = VifurushiTransaction::where('Wakala_code',$wakala_profile->Wakala_code)->get();
            $vifurushi_wallet = VifurushiWallet::where('Wakala_code',$wakala_profile->Wakala_code)->get();
            

        return view('wakalaViews.vifurushi',compact('wakala_profile','vifurushi_list','payment_success','payment_failed','vifurushi_miamala','vifurushi_wallet',));

    }

    public function purchase_vocha_process(Request $request)
    {
        $Id = $request->user_id;
        $current = Carbon::now();
        $Tcode = $this->generate_transactioncode(7,'HBVCH');
        $Tcode.= $current;

        $Amount = ($request->vocha_list - ($request->vocha_list*0.15))*$request->qty;
        $value = $request->vocha_list*$request->qty;

        $URL = "https://api.hotbando.tech/buyVochaWakala";

        $response_url = $this->initialize_pesapay_purchase($Id,$Tcode,$Amount,$URL);

        if($response_url['status'] == true){
            $trans_request_id = $response_url['order_tracking_id'];
            $vifurushi_T = VifurushiTransaction::create([
                'Transaction_id'=>$Tcode,
                'Wakala_code'=> $Id,
                'Transaction_type'=>"Purchase_Vocha",
                'Value'=> $value,
                'Amount'=> $Amount,
                'kifurushi_id'=>$request->vocha_list,
                'Transaction_request_id'=> $trans_request_id,
                'Transaction_status'=>"Pending",

            ]);

            return response()->json(['status'=>$response_url['status'],
            'tcode'=>$Tcode,
            'package'=>$value,
             'redirect_url'=>$response_url['payment_url'],
             
            ]);
        }
        else{
            return response()->json(['status'=> 'bad',
            'tcode'=>$Tcode,
            ]);
        }
       
    }


    Public function generate_transactioncode($size,$key)
    {
        $alpha_key = $key;
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
