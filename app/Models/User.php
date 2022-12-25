<?php

namespace App\Models;

use App\Enums\UserTypes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use ESolution\DBEncryption\Traits\EncryptedAttribute;

class User extends Authenticatable
{
    //https://dev.to/tommyhendrawan/automatic-laravel-data-encryption-with-eloquent-4137
    // this package is used for auto encryption

    use EncryptedAttribute;
    use HasFactory, HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'social_id', 'country_id', 'passport_id',
        'social_type', 'country', 'phone_number', 'profile_picture', 'about', 'linkedin_link', 'fluent_in', 'phone_number', 'type', 'account_status','fcm_token'
    ];
    protected $encryptable = [
        'name', 'email', 'social_id', 'country_id', 'passport_id',
        'social_type', 'id_passport', 'profile_picture', 'linkedin_link', 'type', 'about', 'fluent_in', 'phone_number' 
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function usercountry()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    function totalBookings()
    {
        return BookingModel::where('coach_id', $this->id)->count();
    }
    function getRatings()
    {
        return ReviewModel::where('coach_id', $this->id)->selectRaw('SUM(ratings)/COUNT(coach_id) AS avg_rating')->first()->avg_rating;
    }
    function userLanguages()
    {
        return Languages::whereIn('id', explode(',', $this->fluent_in))->get();
    }

    function getWallet()
    {
        return SansoWalletModel::where('user_id', $this->id)->get()->first();
    }
}
