<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\SansoWalletModel;
use App\Models\user_notifications;
use Illuminate\Http\Request;
use DataTables;

class SansoWalletsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $data = DB::table('sanso_wallets')->select('*')->get();  
        $data =   SansoWalletModel::all(); 
    
        if ($request->ajax()) {
              $data =   SansoWalletModel::all(); 
         //   dd($data->firstName);
             return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('firstName', function ($row) {
                    return isset($row->firstName) ? $row->firstName : "";
                })->addColumn('lastName', function ($row) {
                    return isset($row->lastName) ? $row->lastName : "";
                })->addColumn('email', function ($row) {
                    return isset($row->email) ? $row->email : "";
                })->addColumn('balance', function ($row) {
                    return isset($row->balance) ? $row->balance : "";
                })->addColumn('wallet_status', function ($row) {
              
               if($row->wallet_status == 1)  
               {
              		$status="Pending";  
               }
               if($row->wallet_status == 9)  
              	{
              		$status="Complete";  
              	}
              
               return $status;
                })->addColumn('created_at', function ($row) {
                    return isset($row->created_at) ?  $row->created_at : "";
                })->addColumn('action', function ($row) {
                })->rawColumns(['action', 'status'])->make(true);
        	}
        
        $sanso_wallets = SansoWalletModel::OrderBy('id', 'asc')->get();
        $data = ['page_title' => 'sanso_wallets List', 'sanso_wallets' => $sanso_wallets];
        return view('admin.sansowallet.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\sanso_wallets  $sanso_wallets
     * @return \Illuminate\Http\Response
     */
    public function show(SansoWalletModel $sanso_wallets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sanso_wallets  $sanso_wallets
     * @return \Illuminate\Http\Response
     */
    public function edit(SansoWalletModel $sanso_wallets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sanso_wallets  $sanso_wallets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SansoWalletModel $sanso_wallets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sanso_wallets  $sanso_wallets
     * @return \Illuminate\Http\Response
     */
    public function destroy(SansoWalletModel $sanso_wallets)
    {
        //
    }
}
