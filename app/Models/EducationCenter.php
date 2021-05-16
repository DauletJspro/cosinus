<?php

namespace App\Models;

use App\Http\Requests\EducationCenterRequest;
use Illuminate\Database\Eloquent\Model;

class EducationCenter extends Model
{
    protected $table = 'education_centers';
    protected $fillable = [
        'name_kz',
        'name_ru',
        'description_ru',
        'description_kz',
        'contact_phone',
        'contact_email',
        'image',
    ];

    public static function store(EducationCenterRequest $request)
    {
        $input = $request->all();
        if ($request->has('image')) {
            $file = $request->file('image');
            $name = time() . '.' . $file->getClientOriginalExtension();

            $request->file('image')->storeAs(
                'uploads',
                $name,
                'public'
            );
            $input['image'] = $name;

        }
        if (EducationCenter::create($input)) {
            return true;
        }
        return false;
    }

    public static function updateData(EducationCenterRequest $request, EducationCenter $educationCenter)
    {
        try {
            $input = $request->all();
            if ($request->has('image')) {
                $file = $request->file('image');
                $name = time() . '.' . $file->getClientOriginalExtension();

                $request->file('image')->storeAs(
                    'uploads',
                    $name,
                    'public'
                );
                $input['image'] = $name;

            }
            $educationCenter->update($input);
            return ['success' => true];

        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => sprintf('%s / %s / %s',
                    $exception->getFile(),
                    $exception->getLine(),
                    $exception->getMessage())
            ];
        }
    }
}
