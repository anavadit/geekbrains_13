<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController AS AdminCategoryController;
use App\Http\Controllers\HiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/hello/{name}', fn(string $name) => "Hello, {$name}");

// admin news - должны быть выше(если не в группе) , чтоб не распарсились нижней регуляркой
// для ресорсных контроллеров (с авто методами crud) (-r) достаточно:
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() { // см $ ./vendor/bin/sail php artisan route:list (команда в контейнере запустится из обычной консоли)
    Route::view('/', 'admin.index', ['someVariable' => 'someText'])->name('index');
    Route::resource('/news', AdminNewsController::class); // алиас одноимённого класса
    Route::resource('/categories', AdminCategoryController::class);
});

// news routes
Route::get('/newslist', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+') // чтоб роут парсил только числа в параметрах (айдишники), иначе 404, а не сломанная страница  чтоб  была
    ->name('news.show'); // Меняем урл без изменения имени

    
// Lesson2: homework
Route::get('/hi', [HiController::class, 'index']);

//cats
Route::get('/cats', [CategoryController::class, 'index']);
Route::get('/cats/{id}', [CategoryController::class, 'show'])
    ->where('id', '\d+') // чтоб роут парсил только числа в параметрах (айдишники), иначе 404, а не сломанная страница  чтоб  была
    ->name('cats/show'); // Меняем урл без изменения имени


