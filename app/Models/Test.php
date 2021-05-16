<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Test extends Model
{
    protected $fillable = [
        'name_kz',
        'name_ru',
        'subject_id'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public static function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $test = Test::create($request->all());
            $questions = $request->all()['addmore'];

            foreach ($questions as $question) {
                Question::create([
                    'test_id' => $test->id,
                    'question_kz' => $question['question_kz'],
                    'question_ru' => $question['question_ru'],
                ]);
            }

            DB::commit();

            return [
                'success' => true,
                'message' => 'Вы успешно добавили тест и варианты!',
            ];

        } catch (\Exception $exception) {
            DB::rollBack();
            $message = $exception->getFile() . ' / ' . $exception->getLine() . ' / ' . $exception->getMessage();
            return [
                'success' => false,
                'message' => $message,
            ];
        }

    }

    public static function changeData(Request $request, Test $test)
    {
        try {
            DB::beginTransaction();

            $test->update($request->all());
            $questions = $request->all()['addmore'];

            if (count($test->questions)) {
                foreach ($questions as $question) {
                    if (isset($question['id'])) {
                        Question::findOrFail($question['id'])->update([
                            'question_kz' => $question['question_kz'],
                            'question_ru' => $question['question_ru'],
                        ]);
                    } else {
                        Question::create([
                            'test_id' => $test->id,
                            'question_kz' => $question['question_kz'],
                            'question_ru' => $question['question_ru'],
                        ]);
                    }

                }
            }

            DB::commit();

            return [
                'success' => true,
                'message' => 'Вы успешно изменили тест и варианты!',
            ];

        } catch (\Exception $exception) {
            DB::rollBack();
            $message = $exception->getFile() . ' / ' . $exception->getLine() . ' / ' . $exception->getMessage();
            return [
                'success' => false,
                'message' => $message,
            ];
        }

    }


    public static function deleteAll(Test $test)
    {
        try {
            DB::beginTransaction();
            $questions = $test->questions;
            if (isset($questions)) {
                foreach ($questions as $question) {
                    $question->delete();
                }
            }

            $test->delete();

            DB::commit();

            return [
                'success' => true,
                'message' => 'Вы успешно удалили тест и варианты!',
            ];

        } catch (\Exception $exception) {
            DB::rollBack();
            $message = $exception->getFile() . ' / ' . $exception->getLine() . ' / ' . $exception->getMessage();
            return [
                'success' => false,
                'message' => $message,
            ];
        }

    }
}
