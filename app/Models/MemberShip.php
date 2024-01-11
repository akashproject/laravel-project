<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberShip extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','description','image','parent_id'];

    public function parent()
    {
        return $this->belongsTo(MemberShip::class,'parent_id');
    }

    public function children()
    {
        return $this->hasMany(MemberShip::class,'parent_id');
    }

    
}
