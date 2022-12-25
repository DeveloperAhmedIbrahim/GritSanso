<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class Topics extends Model
{
    use HasFactory;
    protected $fillable=[
        'topic','coach_service_id'
    ];

    function service(){
        $service=ServiceModel::find($this->coach_service_id);
        $ob=new stdClass;
        $ob->service=$service;
        $ob->coach=$service->user();
        $ob->media=$service->media();
        $ob->service_category=$service->serviceCategory();
        return $service;
    }
}
