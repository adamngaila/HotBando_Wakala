<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\vifurushi;
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
        $url = '';

    }
    Public function purchase_kifurushi_process(Request $request){
        $request->validate([
            'qty' => ['required']
        ]);
        $Id = $request->user_id;
        $Tcode = generate_transactioncode(8);
        $Amount = $request->price*$request->qty;
        if(Amount >= $request->price)
        {
        nitialize_kifurushi_purchase($Id,$Tcode,$Amount);
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

}
