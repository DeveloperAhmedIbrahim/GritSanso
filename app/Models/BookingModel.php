<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use ESolution\DBEncryption\Traits\EncryptedAttribute;
use App\Models\User;

class BookingModel extends Model
{
    use EncryptedAttribute;
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'status', 'coachee_id', 'coach_id', 'transaction_id','coach_service_id'
    ];

  
    protected $encryptable = [
//        'status', 'coachee_id', 'coach_id', 'transaction_id','coach_service_id'
    ];
  
    protected $casts = [
        //'status' => ActionEnums::class
    ];


    function getCoach()
    {
		$coach= User::find($this->coach_id);
      	$coach->ratings=$coach->getRatings();
      $coach->fluent_in=$coach->userLanguages();
      $coach->country=$coach->usercountry();
      return $coach;
    }

    function getCoachee()
    {
        return User::find($this->coachee_id);
    }

    function getService(){
        return ServiceModel::find($this->coach_service_id);
    }
    function getTransaction()
    {
        $tr = TransactionModel::find($this->transaction_id);
        $tr->sanso_wallet = $tr->getSansoWallet();
        $tr->payment_gateway = $tr->getPaymentGateway();
        return $tr;
    }
}
