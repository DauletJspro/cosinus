<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $variants = Variant::paginate(10);
        return view('admin.variant.index', compact('variants'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $centers = \App\Models\EducationCenter::all()->pluck('name_ru', 'id')->toArray();
        $schools = School::all()->pluck('name_ru', 'id')->toArray();
        $languages = [1 => 'Казахский', 2 => 'Русский'];
        return view('admin.variant.create',
            compact('centers', 'schools', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $result = Variant::create($request->all());
        if ($result) {
            return redirect(route('variant.index'))
                ->with('success', 'Вы успешно добавили тест!');
        }else {
            return back()->with('error', 'Произошла ошибка');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Variant $variant
     * @return \Illuminate\Http\Response
     */
    public function show(Variant $variant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Variant $variant
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Variant $variant)
    {  $centers = \App\Models\EducationCenter::all()->pluck('name_ru', 'id')->toArray();
        $schools = School::all()->pluck('name_ru', 'id')->toArray();
        $languages = [1 => 'Казахский', 2 => 'Русский'];
        return view('admin.variant.edit',
            compact('variant', 'centers', 'schools', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Variant $variant
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $date = $request->input();
        $result = Variant::findOrFail($id)->update($date);
        if ($result) {
            return redirect(route('variant.index'))
                ->with('success', 'Вы успешно добавили центр!');
        }else {
            return back()->with('error', 'Произошла ошибка');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Variant $variant
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($variant)
    {
        $result = Variant::findOrFail($variant)->delete();
        if ($result) {
            return redirect('admin/variant')->with('success', 'Данные успешно удалены');
        } else {
            return back()->with('error', 'Произошла ошибка');
        }
    }
}
