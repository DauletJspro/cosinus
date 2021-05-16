<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestRequest;
use App\Models\Subject;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $tests = Test::all();
        return view('admin.test.index', compact('tests'));
    }

    public function create()
    {
        return view('admin.test.create');
    }

    public function store(TestRequest $request)
    {
        $result = Test::store($request);
        if ($result['success']) {
            return redirect(route('test.index'))
                ->with('success', 'Вы успешно добавили тест!');
        }
        return redirect(route('test.create'))
            ->withInput()
            ->with(['error' => $result['message']]);
    }

    public function edit(Test $test)
    {
        $questions = $test->questions;
        return view('admin.test.edit', compact('test', 'questions'));
    }

    public function update(TestRequest $request, Test $test)
    {
        $result = Test::changeData($request, $test);
        if ($result['success']) {
            return redirect(route('test.index'))
                ->with('success', 'Вы успешно изменили тест!');
        }
        return redirect(route('test.create'))
            ->withInput()
            ->with(['error' => $result['message']]);
    }

    public function destroy(Test $test)
    {
        $result = Test::deleteAll($test);
        if ($result['success']) {
            return redirect(route('test.index'))
                ->with('success', 'Вы успешно удалили тест!');
        }
        return redirect(route('test.index'))
            ->withInput()
            ->with(['error' => $result['message']]);
    }
}
