<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Education;
use App\Models\Experiences;
use App\Models\LikeModel;
use App\Models\ServiceModel;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use stdClass;

class ServiceController extends Controller
{
    protected $status, $res;

    function __construct()
    {

        $this->status = 200;
        $this->res = new stdClass;
    }


    function coach($id){
        $user = User::find($id);
        $user->country = Country::find($user->id);
        $user->experience = Experiences::where('user_id', $user->id)->get();
        $user->education = Education::where('user_id', $user->id)->get();
        $user->isLiked=LikeModel::where('liked_by',Auth::id())
        ->where('liked',$this->user_id)->get()->first()!=null;
        $user->fluent_in=$user->userLanguages();
        $user->ratings=$user->getRatings(); 
        $user->bookings=$user->totalBookings();
        return $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $array = array();
        if ($req->input('my-services')) {


            foreach (ServiceModel::limit(10)->where('user_id', Auth::id())->latest()->get() as $service) {
                $ob = new stdClass;
                $ob->service = $service;
                $ob->service_category = $service->serviceCategory();
                $ob->coach = $service->user();
                $ob->media = $service->media();
                $ob->topics = $service->topics();
                array_push($array, $ob);
            }
        } else if ($req->input('search')) {
            //search the service
            $term = $req->input('search');
            foreach (ServiceModel::orWhere('service_charges', 'like', "%" . $term . "%")
                ->orWhere('service_title', 'like', "%" . $term . "%")
                ->limit(10)->latest()->get() as $service) {
                $ob = new stdClass;
                $ob->service = $service;
                $ob->service_category = $service->serviceCategory();
                $ob->coach = $service->user();
                $ob->media = $service->media();
                $ob->topics = $service->topics();
                array_push($array, $ob);
            }
        } else if ($req->input('category_id')) {
            foreach (ServiceModel::limit(10)->where('service_category_id', $req->input('category_id'))->get() as $service) {
                $ob = new stdClass;
                $ob->service = $service;
                $ob->service_category = $service->serviceCategory();
                $ob->coach = $service->user();
                $ob->media = $service->media();
                $ob->topics = $service->topics();
                array_push($array, $ob);
            }
        } else {
            //get user country if user has
            foreach (ServiceModel::limit(10)->latest()->get() as $service) {
                $ob = new stdClass;
                $ob->service = $service;
                $ob->service_category = $service->serviceCategory();
                $ob->coach = $service->user();
                $ob->media = $service->media();
                $ob->topics = $service->topics();
                array_push($array, $ob);
            }
        }
        return $array;
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
            $this->validate($request, [
                'service_charges' => "required|numeric",
                'service_title' => "required|string",
                'service_category_id' => "required|numeric",
            ]);
            $data = $request->except('created_at', 'updated_at', 'id');
            $data['user_id'] = Auth::id();
            ServiceModel::create($data);
            $this->res->message = "Service saved for approval from support team!";
            $this->status = 200;
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
            $this->status = 500;
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
        $service = ServiceModel::find($id);
        $this->res->service = $service;
        $this->res->coach = $service->user();
        $this->res->topics = $service->topics();
        $this->res->media = $service->media();
        $this->res->service_category = $service->serviceCategory();
        return response()->json($this->res, $this->status);
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

            if ($request->input('service_charges')) {
                $this->validate($request, [
                    'service_charges' => "required|numeric",

                ]);
                ServiceModel::where('id', $id)->update([
                    'service_charges' => $request->service_charges,

                ]);

                $this->res->message = "Pricing updated!";
                $this->status = 200;
            } else if ($request->input('number_of_sesions')) {
                $this->validate($request, [
                    'number_of_sessions' => "required|numeric",

                ]);
                ServiceModel::where('id', $id)->update([
                    'number_of_sessions' => $request->service_charges,

                ]);

                $this->res->message = "Number of sessions updated!";
                $this->status = 200;
            } else {
                $this->validate($request, [

                    'service_title' => "required|string",
                    'service_category_id' => "required|numeric",
                ]);

                ServiceModel::where('id', $id)->update([
                    'service_title' => $request->service_title,
                    'service_status' => 0,
                    'service_category_id' => $request->service_category_id
                ]);

                $this->res->message = "Service updated and waiting for approval!";
                $this->status = 200;
            }
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
            $this->status = 500;
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
        try {
            $service = ServiceModel::find($id);
            if ($service->user_id == Auth::id()) {
                //delete service
                $service->delete();
                $this->res->message = "Service deleted!";
                $this->status = 200;
            } else {
                $this->res->error = "You are unauthorized to perform this action!";
                $this->status = 401;
            }
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
            $this->status = 500;
        } finally {
            return response()->json($this->res, $this->status);
        }
    }
}
