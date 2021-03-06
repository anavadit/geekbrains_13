<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Category;
// use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;

class NewsController extends Controller
{
    // use ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $model = new News();
        // $news = $model->getNews();

        // dd(
        //     News::query()
        //         ->where('id', '>', 5)
        //         ->orderBy('id', 'desc')
        //         ->get()
        //         ->toSql()
        // );

        // $news = News::query()->select(
        //     News::$availableFields
        // )->get();


        /*\DB::table('categories')
            ->join('news', 'news.category_id', '=', 'categories.id')
            ->select(['categories.*', 'news.title as newsTitle'])
            ->get()*/

        /*$news = \DB::table('news')
            // ->where('title', 'like', '%'.request()->query('s').'%')
            // ->where('id', '<', 10) //или
            // ->orWhere('display', '=', 0)
            ->where([
                ['title', 'like', '%'.request()->query('s').'%'],
                ['id', '<', 10],
                ['display', '=', true]
            ])
            ->whereIn('id', [1,6,9]) // ->whereNotIn()   или  ->whereBetween('id', [1,3])   или   ->whereNotBetween('id', [2,4])
            ->orderBy('title', 'asc')
            // ->offset(5)
            // ->limit(3)
            ->get()
            ->toArray();*/

        // С пагинацией:
        $news = News::query()
            ->whereHas('category', function($query) {
                $query->where('id', '<', 10);
            })
            ->with('category')
            // ->select( News::$availableFields)
            ->paginate(5); // вместо get()

        return view('admin.news.index', [
            'newsList' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::all();

        // $get = data_get($news, 'news.*.title');
        // return response('Hello world!', 201)->header('Content-Type', 'text/html');
        return view('admin.news.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Запускается при сохранении новой созданной новости
     *
     * @param  CreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        // dd($request->all()); // все поля формы отдампить
        // dd($request->only(['title', 'author'])); // только эти поля отдампить
        // dd($request->except(['title', 'author'])); // все кроме этих полей отдампить
        // dd($request->input('title'));
        // dd($request->has('title')); // существование поля
        // dd($request->path());
        // dd($request->fullUrl()); //  с гет-параметрами
        // dd($request->url());
        // dd($request->query());

        // $request->validate([
        //     'title' => ['required', 'string', 'min:5']
        // ]);

        // try{ // не должно быть в контроллере, переносим  в rules
        //     $this->validate($request, [
        //         'title' => ['required', 'string', 'min:5']
        //     ]); // то же самое $request->validate
        // } catch(\Exception $e) { // ValidationException не отрабатывает
        //     dd($e->validator->getMessageBag());
        // }

        // $data = $request->only(['category_id', 'title', 'author', 'status', 'description']) + [
        //     'slug' => \Str::slug($request->input('title'))
        // ];
        $data = $request->only($request->validated()) + [
            'slug' => \Str::slug($request->input('title'))
        ];

        
        $created = News::create($data);

        // $data = json_encode($request->all());
        // file_put_contents(public_path('news/data.json'), $data);

        // return response()->json($request->all(), 201);
        // return response()->download('robots.txt');
        // dd($request->all());

        if ($created) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Не удалось добавить новость')
            ->withInput(); // чтобы вбитые пользователем данные формы сохранились на странице с воспроизведённой ошибкой
    }

    /**
     * Display the specified resource.
     *
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News  $news)
    {
        //
    }

    /**
     * ЗАпускается при открытии формы для редактирования новости
     *
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {

        $categories = Category::all();

        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Запускается при сохранении отредактированной новости
     *
     * @param  EditRequest  $request
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, News  $news)
    {
        
        // $news->title = "blabla";

        // dd($request->validated());

        $updated = $news->fill($request->validated() + [
            'slug' => \Str::slug($request->input('title'))
        ])->save(); 

        if ($updated) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Не удалось добавить новость')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News  $news)
    {
        $deleted = $news->delete();
        if ($deleted) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно удалена!');
        }
    }
}
