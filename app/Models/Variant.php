<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variant extends Model
{

    const KAZAKH = 1;
    const RUSSIAN = 2;

    protected $fillable = [
        'title_ru', 'description_ru', 'center_id', 'school_id', 'price', 'language', 'is_free', 'is_demo'
    ];

    public static function center($id){
        $centerName = EducationCenter::where('id', $id )->first();
        return $centerName->name_ru;
    }

    public static function school($id){
        $schoolName = School::where('id', $id )->first();
        return $schoolName->name_ru;
    }
}
