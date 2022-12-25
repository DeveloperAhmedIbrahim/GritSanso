<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CardModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class CardController extends Controller
{

    protected $res, $status = 200;
    function __construct()
    {
        $this->res = new stdClass;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CardModel::where('user_id',Auth::id())->latest()->get();
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
      exit;
        try {
            $this->validate($request, [
                'holder' => "required",
                'number' => 'required|unique:cards',
                'expiry' => 'required',
                'cvc' => 'required',
                'card_type' => 'required'

            ]);

            $data = $request->only('holder', 'number', 'expiry', 'cvc', 'card_type');
            $data['user_id'] = Auth::id();

            CardModel::create($data);

            $this->res->message = 'Card added successfully!';
        } catch (Exception $ex) {
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
        return CardModel::find($id);
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
        try {
            $this->validate($request, [
                'holder' => "required",
                'number' => 'required|unique:cards',
                'expiry' => 'required',
                'cvc' => 'required',
                'card_type' => 'required'

            ]);

            $data = $request->only('holder', 'number', 'expiry', 'cvc', 'card_type');
            $data['user_id'] = Auth::id();
            CardModel::where('id',$id)->update($data);
            $this->res->message = 'Card updated successfully!';
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
        } finally {
            return response()->json($this->res, $this->status);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card=CardModel::find($id);
        if($card->user_id==Auth::id()){
            //owned
            $card->delete();
            $this->res->message='Card has been deleted!';
        }else{
            //unauthorized
            $this->res->error="You are not authoried to perform this action!";
        }
        return response()->json($this->res,$this->status);
    }
}
