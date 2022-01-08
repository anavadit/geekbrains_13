<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    // Выводит все новости
    public function index() {
        $news = $this->getNews();
        return view('news/index', [
            'news' => $news
        ]);
    }

    // Одна новость
    public function show(int $id) {
        if ($id > 10) {
            abort(404);
        }
        $news = $this->getNewsById($id);
        return view('news/show', [
            'newItem' => $news
        ]);
    }
}
