<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bread_crumb_title',
        'bread_crumb_subtitle',
        'bread_crumb_content',
        // 'name',
    ];
}
