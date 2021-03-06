<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'category_id', 'id'); // 2 foreign_key, 3 local_key
    }
}
