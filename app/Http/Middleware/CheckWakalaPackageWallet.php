<?php

namespace App\Http\Middleware;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Models\WakalaRegister;
use App\Models\VifurushiWallet;
use Closure;
use Illuminate\Http\Request;

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
        $user_id = auth()->User_id();
        $wakala_profile = WakalaRegister::where('User_id',$user_id)->first();
        $kifurushi_wallet = VifurushiWallet::where('Wakala_code',$wakala_profile->Wakala_code)->first();
        if(!$kifurushi_wallet){
            $wakala_vifurushi_wallet = VifurushiWallet::create([
                'Wakala_code'=>$wakala_profile->Wakala_code
            ]);
        }
        return $next($request);
    }
}
