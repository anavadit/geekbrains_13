@extends('layouts.admin')

@section('title') @parent Редактировать новость @endsection

@section('header')
    <h1 class="h2">Редактировать новость</h1>
@endsection

@section('content')
    <div class ="form-group">

        @include('inc.message')

        <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select id="category_id" name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id === $news->category_id) selected @endif>{{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="title">Наименование новости</label>
                <input id="title" type="text" class="form-control" name="title" required="required"  value="{{ $news->title }}" />
                @error('title') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input id="author" type="text" class="form-control" name="author" required="required"  value="{{ $news->author }}" />
                @error('author') <strong style="color:red;">{{ $message }}</strong> @enderror
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

