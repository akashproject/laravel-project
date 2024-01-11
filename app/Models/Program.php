<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'long_description',
        'image',
        'organizer_name',
        'from_date',
        'to_date',
        'program_date',
        'location',
        'program_type',
        'price',
        'num_of_seat'
    ];

    /*public function users(){
        return $this->belongsToMany(User::class,'program_user')->withTimestamps();
    }*/

    public function memberships()
    {
        return $this->belongsToMany(MembershipPlan::class, 'membership_program')->withTimestamps()->withPivot('member_payment_type');
    }
}
