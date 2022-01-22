<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new News();
        $news = $model->getNews();

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
        $news = [
            'news' => [
                [
                    'title' => 1,
                    'description' => 1
                ],
                [
                    'title' => 2,
                    'description' => 2
                ],
                [
                    'title' => 3,
                    'description' => 3
                ]
            ]
        ];

        // $get = data_get($news, 'news.*.title');
        // return response('Hello world!', 201)->header('Content-Type', 'text/html');
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        $request->validate([
            'title' => ['required', 'string', 'min:5']
        ]);

        $data = json_encode($request->all());
        file_put_contents(public_path('news/data.json'), $data);

        return response()->json($request->all(), 201);
        // return response()->download('robots.txt');
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
