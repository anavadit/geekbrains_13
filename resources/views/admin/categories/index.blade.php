@extends('layouts.admin')

@section('header')
    <h1 class="h2">Список категорий</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.categories.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>
        </div>
    </div>
@endsection

@section('content')
<div class="table-responsible">
    @include('inc.message')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Количество новостей</th>
                <th>Заголовок</th>
                <th>Описание</th>
                <th>Опции</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->news->count() }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->description }}</td>
                    <td><a href="{{ route('admin.categories.edit', ['category' => $category]) }}">Ред.</a> | <a href="javascript:;" style="color=red;">Уд.</a>&nbsp;|&nbsp;</td>
                </tr>
            @empty
                <tr><td colspan="6">Записей нет</td></tr>
            @endforelse
        </tbody>
    </table>
    {{ $categories->links() }}
</div>
@endsection

@push('js')
    <script>
        alert("Hello, categories!");
    </script>
@endpush