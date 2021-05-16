@extends('adminlte::page')

@section('title', 'Изменить учебный центр')

@section('content_header')
    <h1 class="m-0 text-dark">Изменить учебный центр</h1>
@stop

@section('content')
    <div class="card card-danger">
        <form action="{{ route('center.update', ['center' => $center]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Название на казахском *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-file-text"></i></span>
                        </div>
                        <input name="name_kz" type="text" class="form-control" value="{{$center->name_kz}}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Название на русском *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-file-text"></i></span>
                        </div>
                        <input name="name_ru" type="text" class="form-control" value="{{$center->name_ru}}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Описание на казахском *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-file-text"></i></span>
                        </div>
                        <textarea name="description_kz" class="form-control" rows="5">
                        {{$center->description_kz}}
                    </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>Описание на руском *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-file-text"></i></span>
                        </div>
                        <textarea name="description_ru" class="form-control" rows="5">
                         {{$center->description_ru}}
                    </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>Номер телефона (Контакт) *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-phone"></i></span>
                        </div>
                        <input type="number" name="contact_phone" class="form-control"
                               value="{{$center->contact_phone}}"
                               data-inputmask='"mask": "+7 (999) 999-9999"'>
                    </div>
                </div>

                <div class="form-group">
                    <label>Электронная почта (Контакт) *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-email"></i></span>
                        </div>
                        <input type="text" name="contact_email" class="form-control"
                               value="{{$center->contact_email}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="image">Выберите изображение</label>
                    <br>
                    <label for="image">Текущее изображение: &nbsp; {{$center->image}}</label>
                    <div class="card" style="width: 18rem; border: 1px solid grey; border-radius: 4px;">
                        <img class="card-img-top"
                             src="{{\Illuminate\Support\Facades\Storage::disk('public')->url('uploads/'.$center->image)}}"
                             alt="Card image cap">
                    </div>
                    <br>
                    <input type="file" name="image" class="btn btn-primary" value="{{$center->image}}">


                </div>


                <button type="submit" class="btn btn-success float-right">
                    Добавить
                </button>
            </div>

        </form>
    </div>
@stop
{{--@section('plugins.inputmask', true)--}}
@section('js')
    <script>
        // $('[data-mask]').inputmask();

        function ajax(item_id, type) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            console.log(item_id);

            $.ajax({
                method: 'POST',
                url: '/admin/students/ajax',
                data: {type: type, item_id: item_id},
                success: function (data) {
                    append_items(data, type);
                }
            });
        }
    </script>
@endsection
