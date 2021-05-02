@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Профиль пользователя </h1>
@stop

@section('content')

    <div class="card card-widget widget-user-2 shadow-sm">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header">
            <!-- /.widget-user-image -->
            <div style="display: flex">
            <i class="fas fa-user-graduate fa-7x"></i>
                <div>
            <h3 class="widget-user-username">{{$user->name}} {{$user->surname}}</h3>
            <h5 class="widget-user-desc">{{$user->email}}</h5>
                </div>
            </div>
        </div>
        <div class="card-footer p-0">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Общие количество тестов <span class="float-right badge bg-primary">31</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Выполненные тесты <span class="float-right badge bg-info">5</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Невыполненные тесты <span class="float-right badge bg-success">12</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Followers <span class="float-right badge bg-danger">842</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
<style>
    .widget-user-header{
        background-color: #91a8dca1!important;
    }
</style>
