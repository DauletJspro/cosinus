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
                    <th>ID-номер</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Учебный центр</th>
                    <th>Школа</th>
                    <th>Язык</th>
                    <th>Цена</th>
                    <th>Бесплатно</th>
                    <th>Демо/Пробный</th>
                    <th>Дата создание</th>
                    <th>Дата изменение</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($variants as $variant)
                    <tr>
                        <td>{{$variant->id}}</td>
                        <td>{{$variant->title_ru}}</td>
                        <td>{{$variant->description_ru}}</td>
                        <td>{{\App\Models\Variant::center($variant->center_id)}}</td>
                        <td>{{\App\Models\Variant::school(($variant->school_id))}}</td>
                        <td> @if($variant->language == 1) Казахский @elseif($variant->language == 2) Руский @endif </td>
                        <td>{{$variant->price}}</td>
                        <td>@if($variant->is_free) <i class="fas fa-check"></i> @else <i class="fas fa-times"></i> @endif
                        </td>
                        <td> @if($variant->is_demo) <i class="fas fa-check"></i> @else <i class="fas fa-times"></i> @endif
                        </td>
                        <td>{{date('Yг.mм.dд (H:i)', strtotime($variant->created_at))}}</td>
                        <td>{{date('Yг.mм.dд (H:i)', strtotime($variant->updated_at))}}</td>
                        <td>
                            <div class="btn-group" style="position: relative;">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    Действие
                                </button>
                                <div class="dropdown-menu" style="position: absolute;">
                                    <form action="{{ route('variant.destroy', $variant->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">
                                            Деактивировать
                                        </button>
                                    </form>
                                    <a class="dropdown-item" href="{{route('variant.edit', ['variant' => $variant])}}">Редактировать</a>
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
