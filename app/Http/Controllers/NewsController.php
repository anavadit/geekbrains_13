<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    // Выводит все новости
    public function index() {

        // $model = new News();
        // $news = $model->getNews(); // просто array

        // dd(
        //     News::query()
        //     ->select(['id', 'author', 'status'])
        //     ->where('id', '>', 5)
        //     ->orderBy('id', 'desc')
        //     ->toSql()
        // );

        $news = News::query()->select(
                News::$availableFields
        )->get(); // Illuminate\Database\Eloquent\Collection -  у коллекций много доп.функций по работе с объектами

        return view('news/index', [
            'newsList' => $news
        ]);
    }

    // Одна новость
    public function show(News $news) {

        // $news = News::findOrFail($news); // это будет под капотом если аргумент модель

        // if ($id > 10) {
        //     abort(404);
        // }
        // $model = new News();
        // $news = $model->getNewsById($id);

// dd($news);

        return view('news.show', [
            'news' => $news
        ]);
    }
}
