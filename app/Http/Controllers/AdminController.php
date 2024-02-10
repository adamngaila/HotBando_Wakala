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
use App\Models\CustomerAccounts;
use App\Models\SalesBook;
use App\Models\Transactions;
use App\Models\vifurushi;
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
    public function show_sales()
    {
        $sales = SalesBook::all();
        return view('admin.revenues.sales',compact('sales'));
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
    public function show_internaldb_customers()
    {
        $customers = CustomerAccounts::all();
        return view('admin.customers.internaldb',compact('customers'));
    }

    public function show_local_customer_list()
    {
        try{
        $response = Http::get('https://api.loanpage.co.tz/tino');
        $data = $response->json();

        
        }
        catch (Exception $e) {
        
            echo "server ofline";
            $data=[
                'first-name'=>'',
                'active'=>'',
                'username'=>'',
                'email'=>'',
                'download-used'=>'',
                'upload-used'=>'',
                'last-seen'=>'',
                'disabled'=>'',
        ];


        }
        return view('admin.customers.index',compact('data'));
    }

    public function sync_customer(){

        $response = Http::get('https://api.loanpage.co.tz/tino');
        $data = $response->json();

        $preparedData = [];
        $dataUpdate = [];
        $dataCreate = [];

        foreach($data as $item){


            $preparedData[]=[
                'Wakala_code'=>$item['last-name'] ?? null,
                'Customer_id'=>$item['.id'],
               'Name'=>$item['username']?? null,
                'Status_Online'=>$item['active']?? null,
                'Status_Disabled'=>$item['disabled'] ?? null,
                'Phone'=>$item['username'] ?? null,
                'email'=>$item['email'] ?? null,
                'password'=>$item['password']?? null,
                'last_seen'=>$item['last-seen'] ?? null,
                'shared_users'=>$item['shared-users'] ?? null,
                'download_used'=>$item['download-used'] ?? null,
               'upload_used'=>$item['upload-used'] ?? null,
               'uptime_used'=>$item['uptime-used'] ?? null,
              
            ];
        }

        $checkExisting = CustomerAccounts::whereIn('Customer_id',array_column($preparedData,'Customer_id'))->pluck('Customer_id')->toArray();
        foreach($preparedData as $item)
        {
            if(in_array($item['Customer_id'],$checkExisting)){
                $dataUpdate[]=$item;
            }else{
                $dataCreate[]=$item;
            }
        }
        foreach($dataUpdate as $item){
            $updateCustomer = CustomerAccounts::where('Customer_id',$item['Customer_id'])->first();
            $updateCustomer->fill($item);
            $updateCustomer->save();

            }
            CustomerAccounts::insert($dataCreate);   
       return response()->json(['message'=>'users data synced successifully']);
    }
       
    /*    
    *  ADMIN VIFURUSHI MAANGEMENT SECTION 
    * 
    */

    public function show_admin_vifurushi()
    {
        $vifurushi = vifurushi::all();
        return view('admin.vifurushi.index',compact('vifurushi'));
        
    }
    public function admin_show_create_vifurushi()
    {
        
        return view('admin.vifurushi.create');
        
    }
    public function admin_create_vivfurushi(Request $request)
    {
        $amount = ((100-($request->amount_perc))/100)*($request->value);
        try{
        $kifurushi_Kipya = vifurushi::create([
          'Description' => $request->Description,
          'value' => $request->value,
          'amount' => $amount,
          'target_user' => $request->target_user,
          'expiration' => $request->expiration,
          'status' => 'Active',

        ]);
        return redirect ('admin_show_vifurushi');
        }catch (Exception $e) {
            // something went wrong
            DB::rollback();
        }

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
