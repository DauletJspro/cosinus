@php($subjects = \App\Models\Subject::all()->pluck('name_ru', 'id')->toArray())
@extends('adminlte::page')

@section('title', 'Добавить тест')

@section('content_header')
    <h1 class="m-0 text-dark">Добавить тест</h1>
@stop
<link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.min.css') }}">
@section('content')
    <div class="card card-danger">
        {!! Form::open(['route' => 'test.store','method' => 'POST']) !!}
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Название на казахском *</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-file-text"></i></span>
                    </div>
                    <input name="name_kz" type="text" class="form-control" value="{{old('name_kz')}}">
                </div>
            </div>
            <div class="form-group">
                <label>Название на русском *</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-file-text"></i></span>
                    </div>
                    <input name="name_ru" type="text" class="form-control" value="{{old('name_ru')}}">
                </div>
            </div>

            <div class="form-group">
                <label>Выберите предмет *</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-file-text"></i></span>
                    </div>
                    {{Form::select('subject_id' ,$subjects,null,
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

                    @if(!empty(old('addmore')))
                        @foreach(old('addmore') as $key => $question)
                            <tr>
                                <td>
                            <textarea type="text" name="addmore[{{$key}}][question_kz]"
                                      placeholder="Вопрос на казахском "
                                      class="form-control summernote"> {{$question['question_kz']}} </textarea>
                                </td>
                                <td>
                             <textarea type="text" name="addmore[{{$key}}][question_ru]"
                                       placeholder="Вопрос на русском "
                                       class="form-control summernote"> {{$question['question_ru']}} </textarea>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger remove-tr">Удалить</button>
                                </td>
                            </tr>
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

        {!! Form::close() !!}
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
