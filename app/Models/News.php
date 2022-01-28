<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public static $availableFields = [
        'id', 'title', 'author', 'status', 'description', 'created_at'
    ];

    protected $fillable = [
        'category_id', 'title', 'author', 'status', 'description', 'slug'
    ]; // разрешает массово обновлять эти поля

    // protected $guarded = [
    //     'id'
    // ]; // аналог fillable, только перечисляет поля, которые не надо проверять, но fillable надёжнее,  $guarded полезно где 350 колонок - при создании id  не проверяется.

    public function getTitleAttribute($value) // применяется всегда когда обращаюсь к title - get  и Attribue - служебные
    {
        return mb_strtoupper($value);
    }

    protected $casts = [
        'display' => 'boolean',
    ];

    public function getNews(): array
    {
        return \DB::table($this->table)->select(['id', 'title', 'author', 'status', 'description'])
            ->get() // коллекция
            ->toArray(); // в массив
    }

    public function getNewsById(int $id)
    {
        return \DB::table($this->table)->find($id); // объект builder-а
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
