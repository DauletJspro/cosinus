@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
@stop
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Input School</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('school.store')}}">
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-list-alt"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Название на казахском" name="name_kz">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-list-alt"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Название на русском" name="name_ru">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-list-alt"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Описание на казахском" name="description_kz">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-list-alt"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Описание на русском" name="description_ru">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone-square-alt"></i></span>
                </div>
                <input type="tel" class="form-control" placeholder="phone" name="phone">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" placeholder="Email" name="email">
            </div>
            <button type="submit" class="btn btn-success">Создать</button>
            </form>
            <!-- /.col-lg-6 -->
            </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
