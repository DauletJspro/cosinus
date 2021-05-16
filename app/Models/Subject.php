<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $tables = 'subjects';
    protected $fillable = [
        'name_kz',
        'name_ru'
    ];
}
