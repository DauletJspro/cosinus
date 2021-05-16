@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название школы</th>
                    <th>Телефон</th>
                    <th>E-mail</th>
                    <th>Дата регистрации</th>
                    <th>Последние обновление</th>
{{--                    <th></th>--}}
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
{{--                        <td>--}}
{{--                            <div class="row"  style="justify-content: space-evenly; display: flex; flex-wrap: wrap;--}}
{{--                            margin-right: -7.5px; margin-left:-7.5px; width: 100% ">--}}
{{--                                <form method="POST" action="{{route('school.show', $school->id)}}">--}}
{{--                                    @method('GET')--}}
{{--                                    @csrf--}}
{{--                                <button type="submit" class="btn btn-info">Info</button>--}}
{{--                                </form>--}}
{{--                                <form method="POST" action="{{route('school.edit', $school->id)}}">--}}
{{--                                    @method('GET')--}}
{{--                                    @csrf--}}
{{--                                    <button type="submit" class="btn btn-primary">Primary</button>--}}
{{--                                </form>--}}
{{--                                <form method="POST" action="{{route('school.destroy', $school->id)}}">--}}
{{--                                    @method('DELETE')--}}
{{--                                    @csrf--}}
{{--                                    <button class="btn btn-danger">Danger</button>--}}
{{--                                </form>--}}
{{--                            </div>--}}

{{--                        </td>--}}

                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Название школы</th>
                    <th>Телефон</th>
                    <th>E-mail</th>
                    <th>Дата регистрации</th>
                    <th>Последние обновление</th>
{{--                    <th></th>--}}
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    {{ $schoolList->onEachSide(5)->links() }}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

