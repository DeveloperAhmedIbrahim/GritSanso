<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ReviewModel extends Model
{
    use HasFactory;
    protected $table='reviews';

    protected $fillable=[
        'review','coach_id','coachee_id','ratings'
    ];

    function getCoach(){
        $user= User::find($this->coach_id);
        $user->country = Country::find($this->coach_id);
        $user->experience = Experiences::where('user_id', $this->coach_id)->get();
        $user->education = Education::where('user_id', $this->coach_id)->get();
        $user->isLiked=LikeModel::where('liked_by',Auth::id())
        ->where('liked',$this->user_id)->get()->first()!=null;
        $user->fluent_in=$user->userLanguages();
        $user->ratings=$user->getRatings(); 
        $user->bookings=$user->totalBookings();
        return $user;
    }
    function getCoachee(){
        $user= User::find($this->coachee_id);
        $user->country = Country::find($user->id);
        $user->experience = Experiences::where('user_id', $this->user_id)->get();
        $user->education = Education::where('user_id', $this->user_id)->get();
        $user->isLiked=LikeModel::where('liked_by',Auth::id())
        ->where('liked',$this->user_id)->get()->first()!=null;
        $user->fluent_in=$user->userLanguages();
        $user->ratings=$user->getRatings(); 
        $user->bookings=$user->totalBookings();
        return $user;
    }
}
