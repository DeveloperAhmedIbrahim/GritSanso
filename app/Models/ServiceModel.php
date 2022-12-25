<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ServiceModel extends Model
{
    use HasFactory;
    protected $table = 'coach_service';

    protected $fillable = [
        'service_charges', 'service_title', 'service_category_id', 'user_id', 'service_status', 'service_sessions'
    ];

    function user()
    {
        $user = User::find($this->user_id);
      if(!$user)
        return new User();
        $user->country =$this->user_id!=null? Country::find($this->user_id):"NA";
        $user->experience = Experiences::where('user_id', $this->user_id)->get();
        $user->education = Education::where('user_id', $this->user_id)->get();
        $user->isLiked=LikeModel::where('liked_by',Auth::id())
        ->where('liked',$this->user_id)->get()->first()!=null;
        $user->fluent_in=$user->userLanguages();
        $user->ratings=$user->getRatings(); 
        $user->bookings=$user->totalBookings();
        return $user;
    }

    function serviceCategory()
    {
        return ServiceCategories::find($this->service_category_id);
    }

    public function sercategories()
    {

        return $this->belongsTo(ServiceCategories::class, 'service_category_id');
    }

    function topics()
    {
        return Topics::where('coach_service_id', $this->id)->get();
    }

    function media()
    {
     
        return MediaModel::where('coach_service_id', $this->id)->get();
    }
}
