@extends('layouts.admin')

@section('title') @parent Редактировать новость @endsection

@section('header')
    <h1 class="h2">Редактировать новость</h1>
@endsection

@section('content')

    @include('inc.message');

    <div class ="form-group">
        <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Наименование новости</label>
                <input id="title" type="text" class="form-control" name="title" required="required"  value="{{ $news->title }}" />
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input id="author" type="text" class="form-control" name="author" required="required"  value="{{ $news->author }}" />
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select id="status" class="form-control" name="status">
                    <option @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if($news->status === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea id="description" class="form-control" name="description">{!! $news->description !!}</textarea>
            </div>
            {{-- <input type="text" name="news[]" value="['title' => 1], ['title => 2]" /> --}}
            <br/>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection

