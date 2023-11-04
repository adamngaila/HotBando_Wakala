<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\WakalaRegister;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.adminDashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_admin()
    {
        $admin = User::where('Usertype','Admin')->get();
        return view('admin.admin.index',compact('admin'));
    }
    public function show_wakala()
    {
        $wakala = DB::table('users')->join('wakala_registers','users.user_id','=','wakala_registers.User_id')->get();
        //$wakala = User::where('Usertype','Wakala')->join('WakalaRegister');
        return view('admin.wakala.index',compact('wakala'));
    }
    public function create_wakala(){
        return view('admin.wakala.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_local_customer_list()
    {
        $response = Http::get('https://api.loanpage.co.tz/tino');
        $data = $response->json();
        
        return view('admin.customers.index',compact('data'));
    }
    public function fetch_customer(){

        $response = Http::get('https://api.loanpage.co.tz/tino');
        $data = $response->json();
        return response( $response,201);
    }
       

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
