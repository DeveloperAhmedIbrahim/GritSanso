<?php

namespace App\Models;

use App\Enums\SiteSettings;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetttingModel extends Model
{
    use HasFactory;
    protected $table="site_settings";
    

    protected $fillable=[
        'key',
        'value'
    ];

    /*protected $casts=[
        'key'=>SiteSettings::class,
        'value'=>SiteSettings::class
    ];
  */
}
