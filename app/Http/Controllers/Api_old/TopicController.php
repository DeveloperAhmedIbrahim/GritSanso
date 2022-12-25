<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Topics;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class TopicController extends Controller
{
    protected $status, $res;

    function __construct()
    {

        $this->status = 200;
        $this->res = new stdClass;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $array = array();

        if ($request->input('coach_service_id')) {
            foreach (Topics::where('coach_service_id',$request->coach_service_id)->get() as $topic) {
                $ob = new stdClass;
                $ob->topic = $topic;
                $ob->service = $topic->service();
                array_push($array, $ob);
            }
        } else {
            foreach (Topics::limit(10)->latest()->get() as $topic) {
                $ob = new stdClass;
                $ob->topic = $topic;
                $ob->service = $topic->service();

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
                'topic' => "required|string",
                'coach_service_id' => "required|numeric",
            ]);
            $data = $request->except('created_at', 'updated_at', 'id');
            Topics::create($data);
            $this->res->message = "Topic added for this service";
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
        $top = Topics::find($id);
        $top->service();
        return response()->json($top, $this->status);
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
                'topic' => "required",
            ]);
            $service = Topics::find($id);
            $data = $request->except('created_at', 'updated_at', 'id', 'coach_service_id');
            $service->update($data);
            $this->res->message = "Topic updated!";
            $this->status = 200;
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
            $service = Topics::find($id);

            $service->delete();
            $this->res->message = "Topic deleted!";
            $this->status = 200;
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
            $this->status = 500;
        } finally {
            return response()->json($this->res, $this->status);
        }
    }
}
