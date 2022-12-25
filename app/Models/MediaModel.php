<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ESolution\DBEncryption\Traits\EncryptedAttribute;
class MediaModel extends Model
{
    use HasFactory;
    use EncryptedAttribute;
    protected $table="media_files";
    protected $fillable=[
        'attachment','attachment_type','type','user_id','coach_service_id','sharable'
    ];

    protected $encryptable=[
        'attachment','attachment_type','type','sharable'
    ];

   
     

}
