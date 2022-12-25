<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class ServiceCalendar extends Model
{
    use HasFactory;
    protected $table='service_calendar';

    protected $fillable=[
        'session_date','session_time','coach_service_id'
    ];

    function service(){
        $service=ServiceModel::find($this->coach_service_id);
        $ob=new stdClass;
        $ob->service=$service;
        $ob->coach=$service->user();
        $ob->media=$service->media();
        $ob->media=$service->topics();
        $ob->service_category=$service->serviceCategory();
        return $service;
    }
}
