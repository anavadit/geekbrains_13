<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

    // Выводит все категории
    public function index() {
        $cats = $this->getCategories();
        return view('cats/index', [
            'cats' => $cats
        ]);
    }

    // Одна категория новостей
    public function show(int $catId) {
        $catNews = $this->getNewsByCatId($catId);
        return view('cats/show', [
            'catId' => $catId,
            'catNews' => $catNews,
        ]);
    }
}
