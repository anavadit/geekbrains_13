@extends('layouts.admin')

@section('header')
    <h1 class="h2">Список новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.news.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
        </div>
    </div>
@endsection

@section('content')
    {{-- <x-alert type="success" message="Успех! Новость добавлена"></x-alert>
    <x-alert type="warning" message="Предупреждение!"></x-alert>
    <x-alert type="danger" message="Критическая ошибка"></x-alert> --}}

    <div class="table-responsible">
        @include('inc.message')
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Категория</th>
                    <th>Заголовок</th>
                    <th>Статус</th>
                    <th>Автор</th>
                    <th>Описание</th>
                    <th>Опции</th>
                </tr>
            </thead>
            <tbody>
                @forelse($newsList as $news)
                    <tr>
                        <td>{{ $news->id }}</td>
                        {{-- optional - чтобы если связи нет, не ломало страницу --}}
                        <td>{{ optional($news->category)->title }}</td>
                        <td>{{ $news->title }}</td>
                        <td>{{ $news->status }}</td>
                        <td>{{ $news->author }}</td>
                        <td>{{ $news->description }}</td>
                        <td>
                            <a href="{{ route('admin.news.edit', ['news' => $news->id]) }}">Ред.</a> 
                            <form action="{{ route('admin.news.destroy', ['news' => $news->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" style="color=red;">Уд.</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">Записей нет</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $newsList->links() }}
    </div>
@endsection
