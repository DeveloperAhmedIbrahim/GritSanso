<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Languages;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class LanguageController extends Controller
{
    protected $res,$status;

    function __construct()
    {
        $this->res=new stdClass;
        $this->status=200;
    }


    function getUserLanguages(Request $req){
        try{
            $user=User::find(Auth::id());
            $ids=explode(',',$user->fluent_in);
            //load languages
            $this->res->languages=Languages::whereIn('id',$ids)->get();
            
        }catch(Exception $ex){
            $this->res->error=$ex->getMessage();
            $this->status=500;
        }finally{
            return response()->json($this->res,$this->status);
        }
    }
    
    function getLanguages(Request $req){
        try{
            $this->res->languages=Languages::all();
            
        }catch(Exception $ex){
            $this->res->error=$ex->getMessage();
            $this->status=500;
        }finally{
            return response()->json($this->res,$this->status);
        }
    }
    function search(Request $req){
        if($req->input('search')){
            return Languages::where('language','like','%'.$req->input('search').'%')->orderBy('language')->get();    
        }else{
            return Languages::orderBy('language')->get();
        }
    }
}
