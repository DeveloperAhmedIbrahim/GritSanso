<?php

namespace App\Http\Controllers;

use App\Models\user_notifications;
use Illuminate\Http\Request; 
use App\Models\ServiceCategories;
use App\Models\ServiceModel;
use DataTables;

class ServiceCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

           $data = ServiceCategories::OrderBy('id' , 'asc')->get();

           return Datatables::of($data)
                   ->addIndexColumn()
                   ->addColumn('created_at', function ($row) {
                     return  $row->created_at->format('d/m/Y');
                   })->addColumn('action', function ($row) {
                   $btn = '<a href='.url('/service_category/'.$row->id.'/edit').'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                    $btn .= '<a href="javascript:void(0)" class="delete_option" data-id="'.$row->id.'""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>';

                   return $btn;
               })->rawColumns(['action'])->make(true);
       }
       $service=ServiceCategories::OrderBy('id' , 'asc')->get();
       $data=['page_title' => 'Service Category List' , 'service' => $service];
       return view('admin.service_category.index' , $data);

         if ($request->ajax()) {

            $data = ServiceCategories::OrderBy('id' , 'asc')->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('created_at', function ($row) {
                      return  $row->created_at->format('d/m/Y');
                    })->addColumn('action', function ($row) {
                    $btn = '<a href='.url('/service_category/'.$row->id.'/edit').'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                     $btn .= '<a href="javascript:void(0)" class="delete_option" data-id="'.$row->id.'""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>';

                    return $btn;
                })->rawColumns(['action'])->make(true);
        }
        $service=ServiceCategories::OrderBy('id' , 'asc')->get();
        $data=['page_title' => 'Service Category List' , 'service' => $service];
        return view('admin.service_category.index' , $data);

    }

    public function create()
    {
        $data=['page_title' => 'Add Service Categories'];
        return view('admin.service_category.create' , $data);
    }

    public function store(Request $request)
    {
        $request->validate([
         
         'service'             => 'required|unique:service_categories,service',
         'service_descriptin'  => 'required'

        ]);

   //   dd($request);

        $service_category=ServiceCategories::create([
         
         'service'            => $request->service,
         'service_descriptin' => $request->service_descriptin

        ]);


        return redirect(url('/service_category'))->with('success' , 'Service Category Added Successfully');
    }

    public function edit($id)
    {
        $service_category=ServiceCategories::find($id);
  //   dd($service_category);
      $data=['page_title' => 'Edit Service Categories - Coachee App' , 'service_category' => $service_category];
        return view('admin.service_category.edit' , $data);
    }

    public function update($id , Request $request)
    {


          $request->validate([
         
         'service'             => 'required',
         'service_descriptin'  => 'required'

        ]);

        $service_category=ServiceCategories::find($id);
        $service_category->service = $request->service;
        $service_category->service_descriptin=$request->service_descriptin;
        $service_category->update();

        return redirect(url('/service_category'))->with('success' , 'Service Category Update Successfully');
    }

    public function delete($id , Request $request)
    {
        $service_category=ServiceCategories::find($id);
         
        if(!empty($service_category)){ 

        $service=ServiceModel::where('service_category_id' , $service_category->id)->first();

        if(!empty($service)){

            return back()->with('error' , 'Service Category Already Assigned To Services');
        }
        else
        {

            $service_category->delete();

         }   

         }   

        return redirect(url('/service_category'))->with('success' , 'Service Category Delete Successfully');
    }

    public function service_status($id)
    {
        $service=ServiceModel::find($id);

        if(!empty($service)){

            if($service->service_status == 1){

                $service->service_status = 0;
                $service->update();

               $note=user_notifications::create([
           
          		 'title'       => 'Service Rejected Successfully!',
     			 'body' => 'Service Rejected Successfully!',
           		 'send_to'   =>$id,              
           		 'send_from_admin'   => '1',
                 ]);
              
              
              
              
                
                return back()->with('success' , 'Service Rejected Successfully');
              
              
            }

            else
            {

                $service->service_status = 1;
                $service->update();
               
              
               $note=user_notifications::create([
           
          		 'title'       => 'Service Approved Successfully!',
     			 'body' => 'Service Approved Successfully!',
           		 'send_to'   =>$id,              
           		 'send_from_admin'   => '1',
                  ]);
               
                return back()->with('success' , 'Service Approved Successfully');
            }
        }
    }


}
