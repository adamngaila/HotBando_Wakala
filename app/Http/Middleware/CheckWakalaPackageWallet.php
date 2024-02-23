<?php

namespace App\Http\Middleware;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Models\WakalaRegister;
use App\Models\VifurushiWallet;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\vifurushi;
use App\Models\VifurushiTransaction;


class CheckWakalaPackageWallet
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user_id = Auth::user()->User_id;
        $wakala_profile = WakalaRegister::where('User_id',$user_id)->first();
        $kifurushi_wallet = VifurushiWallet::where('Wakala_code',$wakala_profile->Wakala_code)->first();
        if(!$kifurushi_wallet){
            $wakala_vifurushi_wallet = VifurushiWallet::create([
                'Wakala_code'=>$wakala_profile->Wakala_code
            ]);
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

        return $next($request);
    }
}
