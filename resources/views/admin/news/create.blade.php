@extends('layouts.admin')

@section('title') @parent Добавить Новость @endsection

@section('header')
    <h1 class="h2">Добавить новость</h1>
@endsection

@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error) 
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    <div class ="form-group">
        <form method="post" action="{{ route('admin.news.store', ['q' => 1]) }}">
            @csrf
            <div class="form-group">
                <label for="title">Наименование новости</label>
                <input id="title" type="text" class="form-control" name="title" required="required"  value="{{ old('title') }}" />
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input id="author" type="text" class="form-control" name="author" required="required"  value="{{ old('author') }}" />
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select id="status" class="form-control" name="status">
                    <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea id="description" class="form-control" name="description">{!! old('description') !!}</textarea>
            </div>
            <input type="text" name="news[]" value="['title' => 1], ['title => 2]" />
            <br/>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection

