<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

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
}
