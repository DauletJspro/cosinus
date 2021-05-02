@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>E-mail</th>
                    <th>Дата регистрации</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($usersList as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->surname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        <div class="row" style="justify-content: space-evenly">
                        <form method="POST" action="{{route('student.show', $user->id)}}">
                            @method('GET')
                            @csrf
                        <button class="btn-primary">Show</button>
                        </form>
                            <form method="POST" action="{{route('student.edit', $user->id)}}">
                                @method('GET')
                                @csrf
                        <button class="btn-success">Update</button>
                            </form>
                            <form method="POST" action="{{route('student.destroy', $user->id)}}">
                                @method('DELETE')
                                @csrf
                        <button class="btn-danger">Delete</button>
                            </form>
                        </div>

                    </td>

                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    {{ $usersList->onEachSide(5)->links() }}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

