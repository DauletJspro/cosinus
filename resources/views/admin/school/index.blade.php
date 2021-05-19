@extends('adminlte::page')

@section('title', 'Список вариантов')

@section('content_header')
    <h1 class="m-0 text-dark">Список вариантов</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('variant.create')}}" class="btn btn-success">Добавить учебный центр</a>
        </div>
        <div class="card-body" style="overflow-x: auto;white-space: nowrap;">
            <table style="" id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название школы</th>
                    <th>Телефон</th>
                    <th>E-mail</th>
                    <th>Дата регистрации</th>
                    <th>Последние обновление</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($schoolList as $school)
                    <tr>
                        <td>{{$school->id}}</td>
                        <td>{{$school->name_ru}}</td>
                        <td>{{$school->phone}}</td>
                        <td>{{$school->email}}</td>
                        <td>{{$school->created_at}}</td>
                        <td>{{$school->updated_at}}</td>
                        <td>
                            <div class="btn-group" style="position: relative;">
                                <form method="POST" action="{{route('school.destroy', $school->id)}}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger">Удалить</button>
                                                                </form>
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
