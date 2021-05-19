<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationCenter;
use App\Models\School;
use App\Models\Subject;
use App\Models\Test;
use App\Models\UserVariant;
use App\Models\Variant;
use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){

        $userCount = User::all()->count();
        $centerCount = EducationCenter::all()->count();
        $testCount = Test::all()->count();
        $subjectCount = Subject::all()->count();
        $schoolCount = School::all()->count();
        $variantCount = Variant::all()->count();
        $userVariantCount = UserVariant::all()->count();
        return view('admin.index.index', compact('userCount', 'centerCount', 'testCount',
        'subjectCount', 'variantCount', 'schoolCount', 'userVariantCount'
        ));
    }
}
