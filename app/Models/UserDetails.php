<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_your_self',
        'dob',
        'city',
        'country',
        'other_contact_number',
        'address',

        'university_name',
        'college_name',
        'about_education',

        'name_of_company',
        'company_turn_over',
        'number_of_employee',

        'organization_name',
        'organization_size',
        'organization_budget',
        'focus_area',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
