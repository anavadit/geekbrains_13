<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    // Выводит все новости
    public function index() {
        $model = new News();
        $news = $model->getNews();
        return view('news/index', [
            'newsList' => $news
        ]);
    }

    // Одна новость
    public function show(int $id) {
        if ($id > 10) {
            abort(404);
        }
        $model = new News();
        $news = $model->getNewsById($id);
        return view('news.show', [
            'news' => $news
        ]);
    }
}
