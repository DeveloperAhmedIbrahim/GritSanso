<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MediaModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
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
    public function index(Request $req)
    {
        if ($req->input('attachment_type')) {

          if($req->input('service_id')){


                      return MediaModel::where('user_id', Auth::id())
                        ->where('coach_service_id',$req->input('service_id'))
                        ->whereEncrypted('attachment_type', $req->attachment_type)->get();
          }else{

            return MediaModel::where('user_id', Auth::id())->whereEncrypted('attachment_type', $req->attachment_type)
                            ->whereNotNull('coach_service_id')
              ->get();
          }
            
        } else {
            return MediaModel::where('user_id', Auth::id())->orderBy('attachment_type')
                            ->whereNotNull('coach_service_id')
              ->get();
        }
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


            if ($request->input('multi')) {
                //multiple files ..

                $this->validate($request, [

                    'attachments' => 'required',
                    'attachment_type' => "required|string",

                ]);
                $paths = array();
                $files = json_decode($request->input('attachments'));

                if (!File::exists(public_path() . '/files')) {
                    File::makeDirectory(public_path() . '/files');
                }
                foreach ($files as $file) {

                    $name = $file->name;

                    // $file = base64_decode($request['profile_pic']);
                    // $folderName = '/uploads/users/';
                    // $safeName = str_random(10) . '.' . 'png';
                    // $destinationPath = public_path() . $folderName;
                    // file_put_contents(public_path() . '/uploads/users/' . $safeName, $file);

                    // //save new file path into db
                    // $userObj->profile_pic = $safeName;
                  $fileName='/files/'.Auth::id()."/" . $name;
                    $filePath=public_path() . '/files/'.Auth::id()."/" . $name;
                    if (!File::exists(public_path() . '/files/'.Auth::id())) {
                        File::makeDirectory(public_path() . '/files/'.Auth::id());
                    }
                    file_put_contents($filePath, base64_decode($file->attachment));

                    $media = MediaModel::create(['user_id' => Auth::id(), 'attachment' => $fileName, 'attachment_type' => $request->attachment_type,
                                                'coach_service_id'=>$request->input('coach_service_id')]);

                    array_push($paths, $media->attachment);
                }
                $this->res->message = "Attachments uploaded successfully!";
              $this->res->coach_service_id=$request->coach_service_id;
                $this->res->data = $paths;
                $this->status = 200;
            } else {

                // $this->validate($request, [
                //     'attachment' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,pptm,pps,ppsm,ppsx,txt,csv,rtf,odt,md',
                //     'attachment_type' => "required|string",

                // ]);
                // $file = $request->file('attachment');

                // //create a filename 
                // $filename = uniqid() . "." . $file->getClientOriginalExtension();
                // //upload the image as a stream to save memory while uploading $response = 
                // //Storage::putFileAs('images', $file, $filename);
                // $request->file('attachment')->move(public_path() . '/docs', $filename);
                // $data = $request->except('created_at', 'updated_at', 'attachment', 'user_id', 'id');
                // $data['user_id'] = Auth::id();
                // $data['attachment'] = '/docs/' . $filename;
                // MediaModel::create($data);
                // $this->res->message = "Attachment Saved!";
                // $this->status = 200;
                $this->res->error = "Only multiple attachments allowed!";
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return MediaModel::find($id);
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
                'attachment' => 'required|file|mimes:jpeg,png,gif,svg,pdf,pptx',
                'attachment_type' => "required|string",

            ]);
            $file = $request->file('attachment');

            //create a filename 
            $filename = uniqid() . "." . $file->getClientOriginalExtension();
            //upload the image as a stream to save memory while uploading $response = 
            //Storage::putFileAs('images', $file, $filename);
            $request->file('attachment')->move(public_path() . '/docs', $filename);
            $data = $request->except('created_at', 'updated_at', 'attachment', 'user_id', 'id');
            $data['user_id'] = Auth::id();
            $data['attachment'] = '/docs/' . $filename;
            $media = MediaModel::find($id);
            $media->update($data);
            $this->res->message = "Attachment updated!";
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
            $exp = MediaModel::find($id);
            if ($exp->user_id == Auth::id()) {
                //delete exp
                $exp->delete();
                $this->res->message = "Attachment deleted!";
                $this->status = 200;
            } else {
                $this->res->error = "You are unauthorized to perform this action!";
             //   $this->status = 401;
                              $this->status = 200;
            }
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
            $this->status = 500;
        } finally {
            return response()->json($this->res, $this->status);
        }
    }
}
