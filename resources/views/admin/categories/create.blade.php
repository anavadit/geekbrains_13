@extends('layouts.admin')

@section('title') @parent Добавить категорию @endsection

@section('header')
    <h1 class="h2">Добавить категорию</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            {{-- <a href="{{ route('admin.categories.store') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить категорию</a> --}}
        </div>
    </div>
@endsection

@section('content')
    <div class ="form-group">
        <form method="post">
            <div class="form-group">
                <label for="title">Наименование категории</label>
                <input id="title" type="text" class="form-control" name="title" required="required" />
            </div>
            <div class="form-group">
                <label for="description">Описание категории</label>
                <textarea id="description" class="form-control" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection

