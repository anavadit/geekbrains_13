@extends('layouts.main')

@section('title')
    @parent Список новостей
@endsection

@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Список новостей</h1>
        </div>
    </div>
@endsection

@section('content')

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse($news as $newItem)
            @if($loop->last)
                <h1>Последняя операция</h1>
            @endif
            <div class="col">
                <div class="card shadow-sm">
                    <a href="{{ route('news/show', ['id' => $newItem['id']]); }}">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>{{ $newItem['title']; }}</title>
                            <rect width="100%" height="100%" fill="#55595c"/>
                            <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $newItem['title']; }}</text>
                        </svg>
                    </a>
                <div class="card-body">
                    <p class="card-text">{!! $newItem['description']; !!}</p>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">Автор: {{ $newItem['author']; }}</small>
                    <small class="text-muted">{{ now('Europe/Moscow') }}</small>
                    </div>
                </div>
                </div>
            </div>
        @empty
            <h2>Новостей нет</h2>
        @endforelse
        
       
    </div>

@endsection
