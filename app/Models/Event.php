<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
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
        'event_date',
        'location',
        'event_type',
        'price',
        'num_of_seat'
    ];

    public function memberships()
    {
        return $this->belongsToMany(MembershipPlan::class, 'event_membership')->withTimestamps()->withPivot('member_payment_type');
    }
}
