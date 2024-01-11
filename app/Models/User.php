<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'fullname',
        'email',
        'password',
        'username',
        'mobile_number',
        'profile_picture',
        

        'role_name',
        'organization_name',
        'service_area_id',
        'resource_id',
        'organization_size',
        'organization_budget',
        'focus_area',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function program(){
        return $this->belongsToMany(Program::class,'program_user')->withTimestamps();
    }

    public function membershipPlan()
    {
        return $this->belongsTo(MembershipPlan::class,'membership_plan_id');
    }

    public function serviceArea(){
        return $this->belongsTo(ServiceArea::class,'service_area_id');
    }

    public function userDetails(){
       return $this->hasOne(UserDetails::class);
    }
}
