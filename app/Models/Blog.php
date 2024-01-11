<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','short_description','long_description','image','aurthor_name','aurthor_image','published_on','membership_plan_id'];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_membership')->withTimestamps();
    }

    public function membershipPlan(){
        return $this->belongsTo(MembershipPlan::class,'membership_plan_id');
    }
}
