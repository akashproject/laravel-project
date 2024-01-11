<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipPlan extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','price','features','tenure','feature_title','feature_content','image'];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_membership')->withTimestamps()->withPivot('member_payment_type');
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'membership_program')->withPivot(['member_payment_type'])->withTimestamps();
    }

    public function blogs(){
        return $this->hasMany(Blog::class,'id');
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}

