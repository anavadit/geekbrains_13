<h1>ID категории новостей = <?=$catId;?></h1>
<h2>Новости категории: <?=$catId;?></h2>
<?php foreach($catNews as $id => $itemNews): ?>
    <div>
        <strong><a href="<?=route('news.show', ['id' => $id]);?>"><?=$itemNews['title'];?></a></strong>
        <p><?=$itemNews['description'];?></p>
        <em>Автор: <?=$itemNews['author'];?></em>
    <hr/>
    </div>
<?php endforeach; ?>