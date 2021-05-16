<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EducationCenterRequest;
use App\Models\EducationCenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EducationCenterController extends Controller
{
    public function index()
    {
        $centres = EducationCenter::select(
            'id',
            'name_kz',
            'name_ru',
            'description_ru',
            'description_kz',
            'contact_phone',
            'contact_email',
            'image'
        )->paginate(15);

        return view('admin.center.index', compact('centres'));
    }

    public function create()
    {
        return view('admin.center.create');
    }

    public function store(EducationCenterRequest $request)
    {
        $result = EducationCenter::store($request);

        if ($result) {
            return redirect(route('center.index'))
                ->with('success', 'Вы успешно добавили центр!');
        }
        return redirect(route('center.create'))
            ->withInput()
            ->with(['error' => 'error']);
    }


    public function edit(EducationCenter $center)
    {
        return view('admin.center.edit', compact('center'));
    }

    public function update(EducationCenterRequest $request, $id)
    {

        $result = EducationCenter::updateData($request, EducationCenter::findOrFail($id));

        if ($result['success']) {
            return redirect(route('center.index'))
                ->with('success', 'Вы успешно добавили центр!');
        }
        return redirect(route('center.create'))
            ->withInput()
            ->with(['error' => $result['message']]);
    }

    public function destroy($id)
    {
        if (EducationCenter::findOrFail($id)->delete()) {
            return redirect(route('center.index'))
                ->with('success', 'Вы успешно удалили центр!');
        }
        return redirect(route('center.index'))
            ->withInput()
            ->with(['error' => 'Произошла ошибка']);
    }
}
