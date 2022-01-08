<h1>Список новостей</h1>
<br/>
<?php foreach($news as $newItem): ?>
    <div>
        <strong><a href="<?=route('news/show', ['id' => $newItem['id']]);?>"><?=$newItem['title'];?></a></strong>
        <p><?=$newItem['description'];?></p>
        <em>Автор: <?=$newItem['author'];?></em>
        <hr/>
    </div>
<?php endforeach; ?>