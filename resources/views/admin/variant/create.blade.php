@extends('adminlte::page')

@section('title', 'Добавить учебный центр')

@section('content_header')
    <h1 class="m-0 text-dark">Добавить учебный центр</h1>
@stop

@section('content')
    <div class="card card-danger">
        {!! Form::open(['route' => 'variant.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Название *</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-file-text"></i></span>
                    </div>
                    <input name="title_ru" type="text" class="form-control" value="{{old('title_ru')}}">
                </div>
            </div>
            <div class="form-group">
                <label>Описание *</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-file-text"></i></span>
                    </div>
                    <textarea name="description_ru" class="form-control" rows="5">
                         {{old('description_ru')}}
                    </textarea>
                </div>
            </div>
            <div class="form-group">
                <label>Выберите учебный центр *</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-file-text"></i></span>
                    </div>
                    {{Form::select('center_id' ,$centers,null,
                        [
                            'class' => 'form-control',
                            'placeholder' =>  'учебный центр',
                        ])
                        }}
                </div>
            </div>
            <div class="form-group">
                <label>Выберите школу *</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-file-text"></i></span>
                    </div>
                    {{Form::select('school_id' ,$schools,null,
                        [
                            'class' => 'form-control',
                            'placeholder' =>  'школа',
                        ])
                        }}
                </div>
            </div>
            <div class="form-group">
                <label>Выберите язык *</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-file-text"></i></span>
                    </div>
                    {{Form::select('language' ,$languages,null,
                        [
                            'class' => 'form-control',
                            'placeholder' =>  'язык',
                        ])
                        }}
                </div>
                <div class="form-group">
                    <label>Цена *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-file-text"></i></span>
                        </div>
                        <input name="price" type="number" class="form-control" value="{{old('price')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Бесплатно </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-file-text"></i></span>
                        </div>
                        {!! Form::checkbox('is_free', true) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label>Демо/Пробный </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-file-text"></i></span>
                        </div>
                        {!! Form::checkbox('is_demo', true) !!}
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success float-right">
                Добавить
            </button>
        </div>

        {!! Form::close() !!}
    </div>
@stop
{{--@section('plugins.inputmask', true)--}}

