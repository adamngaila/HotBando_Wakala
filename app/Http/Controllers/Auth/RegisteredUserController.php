<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\WakalaRegister;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'max:10','min:10'],
        ]);
        $address = $request->location;
        $address .= ',';
        $address .= $request->region;
        $address .= 'Tanzania';




        $user = User::create([
            'User_id' => $this->generate_userid(3),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'Usertype' => 'Admin',
            'Status' => 'Active',
            'Region' => $request->region,
            'location' => $request->location,
            'Adress' => $address,
            'Phone' => $request->phone,
            'Picture' => $request->picture,
        ]);

        event(new Registered($user));

        Auth::login($user);
        if($request->usertype == 'Wakala')
        {

            return redirect(RouteServiceProvider::HOME);
        }
        if($request->usertype == 'Admin')
        {

            return redirect(RouteServiceProvider::ADMIN);
        }
    }
    public function create_wakala(Request $request){

        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'max:10','min:10'],
        ]);
        $address = $request->location;
        $address .= ',';
        $address .= $request->region;
        $address .= 'Tanzania';
        $userid = $this->generate_userid(3);
        $wakala_code = $this->generate_wakalacode(4);
       
        try{

        $user = User::create([
            'User_id' =>$userid ,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'Usertype' => 'Wakala',
            'Status' => $request->status,
            'Region' => $request->region,
            'location' => $request->location,
            'Adress' => $address,
            'Phone' => $request->phone,
            'Picture' => $request->picture,
        ]);

        $Wakala = WakalaRegister::create([
        'User_id'=>$userid ,
        'Wakala_code'=>$wakala_code ,
        'Wakala_commission'=> $request->commission,
        'Contract'=>$request->contract,
        'Status' => $request->status,
        'Target_Sales'=>$request->target,
        ]);

        return redirect ('show_wakala');
    }catch (Exception $e) {
        // something went wrong
        DB::rollback();
    }
    if (empty($user)) {
        // something went wrong
        DB::rollback();

        // TODO: Notify MauzoSheet Team of a failed registration
    }
    if (empty($Wakala)) {
        // something went wrong
        DB::rollback();

        // TODO: Notify MauzoSheet Team of a failed registration
    }

    }

    Public function generate_userid($size)
    {
        $alpha_key ='HB-USR-';
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
    Public function generate_wakalacode($size)
    {
        $alpha_key ='HB-WKL-';
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
