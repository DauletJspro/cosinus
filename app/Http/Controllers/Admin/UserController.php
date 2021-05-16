<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $usersList = User::select('id', 'name', 'surname', 'email', 'created_at')->paginate(10);
        return view('admin.students.index', compact('usersList'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.students.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.students.update', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $date = $request->input();
        $result = User::findOrFail($id)->update($date);
        if ($result) {
            return redirect('admin/student')->with('success', 'Данные успешно изменены');
        } else {
            return back()->with('error', 'Произошла ошибка');
        }
    }

    public function destroy($id)
    {
        $result = User::findOrFail($id)->delete();
        if ($result) {
            return redirect('admin/student')->with('success', 'Данные успешно удалены');
        } else {
            return back()->with('error', 'Произошла ошибка');
        }
    }
}
