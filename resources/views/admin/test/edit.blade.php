@php($subjects = \App\Models\Subject::all()->pluck('name_ru', 'id')->toArray())
@extends('adminlte::page')

@section('title', 'Редактировать тест')

@section('content_header')
    <h1 class="m-0 text-dark">Редактировать тест</h1>
@stop
<link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.min.css') }}">
@section('content')
    <div class="card card-danger">
        <form action="{{ route('test.update', ['test' => $test]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Название на казахском *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-file-text"></i></span>
                        </div>
                        <input name="name_kz" type="text" class="form-control" value="{{$test->name_kz}}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Название на русском *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-file-text"></i></span>
                        </div>
                        <input name="name_ru" type="text" class="form-control" value="{{$test->name_ru}}">
                    </div>
                </div>

                <div class="form-group">
                    <label>Выберите предмет *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-file-text"></i></span>
                        </div>
                        {{Form::select('subject_id' ,$subjects,$test->subject_id,
                            [
                                'class' => 'form-control',
                                'placeholder' =>  'Выберите предмет',
                            ])
                            }}
                    </div>
                </div>


                <div class="form-group ">
                    <table class="table table-bordered" id="dynamicTable">
                        <tr>
                            <th>Вопрос на казахском *</th>
                            <th>Вопрос на русском *</th>

                            <th>Действие</th>
                        </tr>
                        @if(count($questions))
                            @php($counter = 0)
                            @foreach($questions as $key => $question)
                                <tr>
                                    <td>
                            <textarea type="text" name="addmore[{{$counter}}][question_kz]"
                                      placeholder="Вопрос на казахском "
                                      class="form-control summernote"> {{$question->question_kz}} </textarea>
                                    </td>
                                    <td>
                             <textarea type="text" name="addmore[{{$counter}}][question_ru]"
                                       placeholder="Вопрос на русском "
                                       class="form-control summernote"> {{$question->question_ru}} </textarea>
                                        <input type="hidden" name="id" value="{{$question->id}}">
                                    </td>

                                    <td>
                                        @if($counter == 0)
                                            <button type="button" name="add" id="add" class="btn btn-success">Добавить
                                                больше
                                            </button>
                                        @endif
                                        <button type="button" class="btn btn-danger remove-tr">Удалить</button>
                                    </td>
                                </tr>
                                <?php $counter++; ?>
                            @endforeach
                        @else
                            <tr>
                                <td>
                            <textarea type="text" name="addmore[0][question_kz]"
                                      placeholder="Вопрос на казахском "
                                      class="form-control summernote"> </textarea>
                                </td>
                                <td>
                             <textarea type="text" name="addmore[0][question_ru]"
                                       placeholder="Вопрос на русском "
                                       class="form-control summernote"> </textarea>
                                </td>
                                <td>
                                    <button type="button" name="add" id="add" class="btn btn-success">Добавить больше
                                    </button>
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>

                <button type="submit" class="btn btn-success float-right">
                    Сохранить
                </button>
            </div>

        </form>
    </div>
@stop
@section('js')
    <script src="{{asset('vendor/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        function summernote() {
            $('.summernote').summernote()
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        }

        var i = 0;

        $("#add").click(function () {
            ++i;
            $("#dynamicTable").append(
                '<tr>' +
                '<td>' +
                '<textarea type="text" name="addmore[' + i + '][question_kz]" placeholder="Вопрос на казахском" class="form-control summernote" /></textarea>' +
                '</td>' +
                '<td>' +
                '<textarea type="text" name="addmore[' + i + '][question_ru]" placeholder="Вопрос на русском" class="form-control summernote" /></textarea>' +
                '</td>' +
                '<td>' +
                '<button type="button" class="btn btn-danger remove-tr">Удалить</button>' +
                '</td>' +
                '</tr>');
            summernote();

        });

        $(document).on('click', '.remove-tr', function () {
            $(this).parents('tr').remove();
        });

        summernote();
    </script>
    <style>

    </style>
@endsection
