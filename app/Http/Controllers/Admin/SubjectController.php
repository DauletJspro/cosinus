<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::select('id', 'name_kz', 'name_ru', 'created_at', 'updated_at')->paginate(15);
        return view('admin.subject.index', compact('subjects'));
    }

    public function create()
    {
        return view('admin.subject.create');
    }

    public function store(SubjectRequest $request)
    {
        if (Subject::create($request->all())) {
            return redirect(route('subject.index'))
                ->with('success', 'Вы успешно добавили предмет!');
        }
        return redirect(route('subject.create'))
            ->withInput()
            ->with(['error' => 'Произошла ошибка!']);
    }

    public function edit(Subject $subject)
    {
        return view('admin.subject.edit', compact('subject'));
    }

    public function update(SubjectRequest $request, Subject $subject)
    {
        if ($subject->update($request->all())) {
            return redirect(route('subject.index'))
                ->with('success', 'Вы успешно изменили предмет!');
        }
        return redirect(route('subject.create'))
            ->withInput()
            ->with(['error' => 'Произошла ошибка!']);
    }

    public function destroy(Subject $subject)
    {
        if ($subject->delete()) {
            return redirect(route('subject.index'))
                ->with('success', 'Вы успешно удалили предмет!');
        }
        return redirect(route('subject.index'))
            ->withInput()
            ->with(['error' => 'Произошла ошибка!']);
    }
}
