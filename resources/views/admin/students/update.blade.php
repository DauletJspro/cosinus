@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
        <div class="col-md-6">
            <form class="card card-success" method="POST" action="{{route('student.show', $user->id)}}">
                @method('PUT')
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Обновление данных пользователя </h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Имя:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-cog"></i></span>
                            </div>
                            <input type="text" class="form-control" name="name" placeholder="{{($user->name)}}"
                                   value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Фамилия:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-cog"></i></span>
                            </div>
                            <input type="text" class="form-control" name="surname" placeholder="{{($user->surname)}}"
                                   value="{{$user->surname}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-cog"></i></span>
                            </div>
                            <input type="email" class="form-control" name="email" placeholder="{{($user->email)}}"
                                   value="{{$user->email}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">
                    Изменить
                    </button>
        </div>
            </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

