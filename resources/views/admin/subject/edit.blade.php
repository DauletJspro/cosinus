@extends('adminlte::page')

@section('title', 'Изменить учебный центр')

@section('content_header')
    <h1 class="m-0 text-dark">Изменить учебный центр</h1>
@stop

@section('content')
    <div class="card card-danger">
        <form action="{{ route('subject.update', ['subject' => $subject]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Название на казахском *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-file-text"></i></span>
                        </div>
                        <input name="name_kz" type="text" class="form-control" value="{{$subject->name_kz}}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Название на русском *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-file-text"></i></span>
                        </div>
                        <input name="name_ru" type="text" class="form-control" value="{{$subject->name_ru}}">
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-right">
                    Изменить
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
