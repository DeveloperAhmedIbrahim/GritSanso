<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategories extends Model
{
    use HasFactory;
    protected $table='service_categories';

    protected $fillable=[
        'service',
        'service_description',
      'service_descriptin'	
    ];

    public function service()
    {
        return $this->hasOne(ServiceModel::class , 'service_category_id');
    }
}

