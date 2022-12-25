<?php

namespace App\Http\Controllers;

use App\Models\SiteSetttingModel;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

      
        $data = SiteSetttingModel::OrderBy('id' , 'asc')->get();
         // dd( $data );
        foreach ($data as $data) {
            echo $data->keys;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\site_setting  $site_setting
     * @return \Illuminate\Http\Response
     */
    public function show(site_setting $site_setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\site_setting  $site_setting
     * @return \Illuminate\Http\Response
     */
    public function edit(site_setting $site_setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\site_setting  $site_setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, site_setting $site_setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\site_setting  $site_setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(site_setting $site_setting)
    {
        //
    }
}
