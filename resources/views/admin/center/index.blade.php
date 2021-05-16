@extends('adminlte::page')

@section('title', 'Список учебных центров')

@section('content_header')
    <h1 class="m-0 text-dark">Список учебных центров</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('center.create')}}" class="btn btn-success">Добавить учебный центр</a>
        </div>
        <div class="card-body" style="overflow-x: auto;white-space: nowrap;">
            <table style="" id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID-номер</th>
                    <th>Название на казахском</th>
                    <th>Название на русском</th>
                    <th>Описание на казахском</th>
                    <th>Описание на русском</th>
                    <th>Конт. телефон</th>
                    <th>Конт. почта</th>
                    <th>Дата создание</th>
                    <th>Дата изменение</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($centres as $center)
                    <tr>
                        <td>{{$center->id}}</td>
                        <td>{{$center->name_kz}}</td>
                        <td>{{$center->name_ru}}</td>
                        <td>{{$center->description_kz}}</td>
                        <td>{{$center->description_ru}}</td>
                        <td>{{$center->contact_phone}}</td>
                        <td>{{$center->contact_email}}</td>
                        <td>{{date('Yг.mм.dд (H:i)', strtotime($center->created_at))}}</td>
                        <td>{{date('Yг.mм.dд (H:i)', strtotime($center->updated_at))}}</td>
                        <td>
                            <div class="btn-group" style="position: relative;">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    Действие
                                </button>
                                <div class="dropdown-menu" style="position: absolute;">
                                    <form action="{{ route('center.destroy', $center->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">
                                            Деактивировать
                                        </button>
                                    </form>
                                    <a class="dropdown-item" href="{{route('center.edit', ['center' => $center])}}">Редактировать</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
@stop
@section('plugins.Select2', true)
@section('plugins.Datatables', true)
@section('js')
    <script>
        $('.select2').select2()

        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });


        function ajax(item_id, type) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'POST',
                url: '/admin/students/ajax',
                data: {type: type, item_id: item_id},
                success: function (data) {
                    append_items(data, type);
                }
            });

            function append_items(data, type) {
                type = type === 'get_regions' ? 'region_id' : 'school_id';
                $('#' + type).prop('disabled', false);
                $('#' + type).find('option')
                    .remove()
                    .end();

                $.each(data, function (index, value) {
                    length = Object.keys(data).length;
                    $('#' + type)
                        .append($("<option></option>")
                            .attr("value", index)
                            .text(value));
                });
            }
        }

    </script>
@stop
