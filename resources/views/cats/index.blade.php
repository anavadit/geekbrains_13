<h1>Список категорий новостей</h1>
<br/>
<?php foreach($cats as $catId => $catItem): ?>
    <div>
        <strong>
            <a href="{{ route('cats/show', ['id' => $catId]); }}">
                {{ $catItem['title']; }}>
            </a>
        </strong>
        <p>{{ $catItem['description']; }}</p>
        <hr/>
    </div>
<?php endforeach; ?>