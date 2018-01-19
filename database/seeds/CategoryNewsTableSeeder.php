<?php

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\Category;
use App\Models\CategoryNews;
class CategoryNewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        $categories = Category::where('status','<>',-1)->pluck('id')->toArray();
        $news = News::where('status','<>',-1)
            ->pluck('id')->toArray();
        
        for ($i = 0; $i < 20; $i++){
            CategoryNews::create([
                'categoryId'=>$faker->randomElement($categories),
                'newsId'=>$faker->randomElement($news),
                'status'=>$faker->randomElement([-1,1])
            ]);
        }
    }
}
