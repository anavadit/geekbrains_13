<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Заполнение фейковыми данными
     *
     * @return array
     */
    public function getNews(): array
    {
        $faker = Factory::create();
        $news = [];
        for ($i = 0; $i < 10; $i++) {
            $news[] = [
                'id' => $i,
                'title' => $faker->jobTitle(),
                'description' => $faker->text(250),
                'author' => $faker->userName()
            ];
        }
        return $news;
    }

    public function getNewsById(int $id): array
    {
        $faker = Factory::create(); // псевдоновость
        return [
            'id' => $id,
            'title' => $faker->jobTitle(),
            'description' => $faker->text(250),
            'author' => $faker->userName()
        ];
    }

    public function getCategories(): array 
    {
        $faker = Factory::create();
        $cats = [];
        for ($i = 0; $i < 5; $i++) {
            $cats[$i] = [
                'title' => $faker->jobTitle(),
                'description' => $faker->text(250),
            ];
        }
        return $cats;
    }

    public function getNewsByCatId(int $catId): array 
    {
        $faker = Factory::create();
        $news = [];
        for ($i = 0; $i < 4; $i++) {
            $news[$i] = [
                'category_id' => $catId,
                'title' => $faker->jobTitle(),
                'description' => $faker->text(250),
                'author' => $faker->userName()
            ];
        }
        return $news;
    }
}
