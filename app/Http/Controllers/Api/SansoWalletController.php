<?php

namespace App\Http\Controllers\Api;

use App\Enums\ActionEnums;
use App\Http\Controllers\Controller;
use App\Models\SansoWalletModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use stdClass;

class SansoWalletController extends Controller
{
    protected $status = 200;
    protected $res;

    function __construct()
    {
        $this->res = new stdClass;
    }


    function walletLogin(Request $req)
    {
        try {
            $this->validate($req,[
                'email'=>'required|email',
                'password'=>'required'
            ]);

            $wallet=SansoWalletModel::whereEncrypted('email',$req->email)
            ->get()->first();

            if($wallet){
                
                
                
                if(Hash::check($req->password,$wallet->password)){
                    $this->res->wallet=$wallet;
                }else{
                    $this->res->error="Invalid credentials!";
                }
                
            }else{
                $this->res->error="No SansoPay account found on this email!";
            }
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
        } finally {
            return response()->json($this->res,$this->status);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallet = SansoWalletModel::where('user_id', Auth::id())->get()->first();
        if ($wallet) {
         return  $wallet;
            	$wall=DB::table('transactions')->select(DB::raw('amount-(amount*(servceFees/100)) as price'),'amount')->where('id',16)->get();
          return $wall;
        }
        $this->res->message = "No wallet found!";
        return response()->json($this->res, $this->status);
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
        try {

            $this->validate(
                $request,
                [
                    'firstName' => "required|string", 'lastName' => "required|string",
                    'email' => "required|email|", 'password'
                ],
                [
                    'First name is required!', 'Last name is required!',  'email.unique_encrypted'=>'Email is already taken!', 'Password is required!'
                ]
            );

		if(SansoWalletModel::whereEncrypted('email',$request->email)->get()->first()){
  
 			 $this->res->error='This email is already registered!';
  
		}else{
            $wallet = new SansoWalletModel();
            $wallet->firstName = $request->firstName;
            $wallet->lastName = $request->lastName;
            $wallet->email = $request->email;
            $wallet->password = Hash::make($request->password);
            $wallet->balance = 0;
            $wallet->user_id = Auth::id();
            $wallet->wallet_status = 1;
            $wallet->save();

            $this->res->wallet = $wallet;
            $this->res->message = 'Wallet created!';
			}
  
        } catch (Exception $ex) {
            $this->status = 200;
            $this->res->error = $ex->getMessage();
        } finally {
            return response()->json($this->res, $this->status);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
