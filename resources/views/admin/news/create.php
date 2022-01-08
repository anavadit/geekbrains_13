<h1>Добавить новость</h1>
<form action="<?=route('admin/news.store', []);?>" method="post">
    <input type="hidden" name="_token" value="<?=csrf_token();?>" />
    <select name="news['category_id']" required="required">
        <option value="">..Выберите категорию..</option>
        <?php foreach($cats as $catId => $cat) : ?>
            <option value="<?=$catId;?>"><?=$cat['title'];?></option>
        <?php endforeach; ?>
    </select>
   <input type="text" name="news['title']" value="" placeholder="Название новости"/>
   <input type="text" name="news['description']" value="" placeholder="Текст новости" />
   <input type="submit" name="send" value="Сохранить" />
</form>