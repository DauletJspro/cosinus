<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name_kz', 'name_ru', 'description_kz', 'description_ru', 'phone', 'email'
    ];
}
