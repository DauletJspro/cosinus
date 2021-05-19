@extends('adminlte::page')

@section('title', 'Изменить учебный центр')

@section('content_header')
    <h1 class="m-0 text-dark">Изменить учебный центр</h1>
@stop

@section('content')
    <div class="card card-danger">
        <form action="{{ route('variant.update', $variant->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Название *</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-file-text"></i></span>
                    </div>
                    <input name="title_ru" type="text" class="form-control" value="{{$variant->title_ru}}">
                </div>
            </div>
            <div class="form-group">
                <label>Описание на руском *</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-file-text"></i></span>
                    </div>
                    <textarea name="description_ru" class="form-control" rows="5">
                         {{$variant->description_ru}}
                    </textarea>
                </div>
            <div class="form-group">
                <label>Выберите учебный центр *</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-file-text"></i></span>
                    </div>
                    {{Form::select('center_id' ,$centers, $variant->center_id,
                        [
                            'class' => 'form-control',
                            'placeholder' =>  'учебный центр'
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
                    {{Form::select('school_id' ,$schools, $variant->school_id,
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
                    {{Form::select('language' ,$languages, $variant->language,
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
                        <input name="price" type="number" class="form-control" value="{{$variant->price}}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Бесплатно </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-file-text"></i></span>
                        </div>
                        {{Form::select('is_free' ,['Платный', 'Бесплатный'], $variant->is_free,
    [
        'class' => 'form-control',
    ])
    }}
                    </div>
                </div>
                <div class="form-group">
                    <label>Демо/Пробный </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-file-text"></i></span>
                        </div>
                        {{Form::select('is_demo' ,['Оигинал', 'Демо/Пробный'], $variant->is_demo,
    [
        'class' => 'form-control',
    ])
    }}
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success float-right">
                Изменить
            </button>
        </div>
        </div>
        </form>
    </div>
@stop
{{--@section('plugins.inputmask', true)--}}
@section('js')

@endsection
