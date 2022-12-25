<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FileSharingModel;
use App\Models\MediaModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use stdClass;

class FileShareController extends Controller
{
    protected $res,$status=200;

    function __construct()
    {
        
        $this->res=new stdClass;
        $this->status=200;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //shared by current user
        $files=FileSharingModel::where('shared_by',Auth::id())->latest()->get();
        $data=array();
        foreach($files as $file){
            $file->getSharedBy();
            $file->getSharedWith();
            array_push($data,$file);
        }
        return $data;
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
        try
        {

            $this->validate($request,[

                'shared_with'=>"required",
            ],[
              'shared_with.required'=>"No coachee selected!"
            ]);
            if ($request->input('multi')) {
                //multiple files ..
                          $this->res->m='File shared successfully!';
                $this->validate($request, [

                    'attachments' => 'required',
                    'attachment_type' => "required|string",

                ],[
                 'attachments.required'=> 'No file selected',
                  'attachment_type.required'=>'Invalid attachments type'
                ]);
                $paths = array();
                $files = json_decode($request->input('attachments'));

                if (!File::exists(public_path() . '/files')) {
                    File::makeDirectory(public_path() . '/files');
                }

                foreach ($files as $file) {

                    $name = $file->name;
                                        $this->res->ff='File shared successfully!';
                    // $file = base64_decode($request['profile_pic']);
                    // $folderName = '/uploads/users/';
                    // $safeName = str_random(10) . '.' . 'png';
                    // $destinationPath = public_path() . $folderName;
                    // file_put_contents(public_path() . '/uploads/users/' . $safeName, $file);

                    // //save new file path into db
                    // $userObj->profile_pic = $safeName;
                  $fileName='/files/'.Auth::id()."/" . $name;
                    $filePath=public_path() . $fileName;
                    if (!File::exists(public_path() . '/files/'.Auth::id())) {
                        File::makeDirectory(public_path() . '/files/'.Auth::id());
                    }
                    file_put_contents($filePath, base64_decode($file->attachment));

                    $media = MediaModel::create(['user_id' => Auth::id(), 'attachment' => $fileName, 'attachment_type' => $request->attachment_type]);

                    array_push($paths, $media->attachment);
                    FileSharingModel::create([
                        'file_id'=>$media->id,
                        'shared_with'=>$request->shared_with,
                        'shared_by'=>Auth::id()
                    ]);
                                            $this->res->gg='File shared successfully!';
        
                }
                          $this->res->mm='File shared successfully!';
                
                $this->status = 200;
            }
            $not=new NotificationController();
            $not->notify([
                'title'=>Auth::user()->name." shared a file",
                'body'=>"You have received a file for your booked service",
                'send_to'=>$request->shared_with,
                'send_from'=>Auth::id(),
                'status'  =>"unread" 
            ]);
            
            $this->res->message='File shared successfully!';
        }catch(Exception $ex){
            $this->res->error=$ex->getMessage();
          $this->res->req=$request->shared_with;
        }finally{
            return response()->json($this->res,$this->status);
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
        try{
            $res=FileSharingModel::where('shared_by',Auth::id())
            ->where('id',$id)->delete();
            $this->res->message=$res;
        }catch(Exception $ex){
            $this->res->error=$ex->getMessage();
        }finally{
            return response()->json($this->res,$this->status);
        }
    }
}
