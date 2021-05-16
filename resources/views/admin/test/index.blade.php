@extends('adminlte::page')

@section('title', 'Список тестов')

@section('content_header')
    <h1 class="m-0 text-dark">Список тестов</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('test.create')}}" class="btn btn-success">Добавить тест</a>
        </div>
        <div class="card-body" style="overflow-x: auto;white-space: nowrap;">
            <table style="" id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID-номер</th>
                    <th>Название на казахском</th>
                    <th>Название на русском</th>
                    <th>Предмет</th>
                    <th>Кол-во вопросов</th>
                    <th>Дата создание</th>
                    <th>Дата изменение</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tests as $test)
                    <tr>
                        <td>{{$test->id}}</td>
                        <td>{{$test->name_kz}}</td>
                        <td>{{$test->name_ru}}</td>
                        <td>{{isset($test->subject) ? $test->subject->name_ru : 'Не указано!'}}</td>
                        <td>10</td>
                        <td>{{date('Yг.mм.dд (H:i)', strtotime($test->created_at))}}</td>
                        <td>{{date('Yг.mм.dд (H:i)', strtotime($test->updated_at))}}</td>
                        <td>
                            <div class="btn-group" style="position: relative;">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    Действие
                                </button>
                                <div class="dropdown-menu" style="position: absolute;">
                                    <form action="{{ route('test.destroy', $test->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">
                                            Деактивировать
                                        </button>
                                    </form>
                                    <a class="dropdown-item" href="{{route('test.edit', ['test' => $test])}}">Редактировать</a>
                                </div>
                                <div>

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
