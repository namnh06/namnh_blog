<?php

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\NewsImage;
class NewsImagesTableSeeder extends Seeder
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
        $news = News::where('status','<>',-1)
            ->pluck('id')->toArray();
        for($i = 0; $i < 20; $i++){
            NewsImage::create([
                'newsId'=>$faker->randomElement($news),
                'status'=>$faker->randomElement([-1,1])
            ]);
        }
    }
}
