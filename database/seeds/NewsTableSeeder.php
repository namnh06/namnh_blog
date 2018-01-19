<?php

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\Author;
class NewsTableSeeder extends Seeder
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
        
        $authors = Author::where('status','<>','-1')
        ->pluck('id')->toArray();
        for($i = 0; $i < 20; $i++){
            News::create([
                'title'=>$faker->paragraph,
                'description'=>$faker->text,
                'content'=>$faker->randomHtml(1,2),
                'authorId'=>$faker->randomElement($authors),
                'readDuration'=>$faker->randomDigit,
                'status'=>$faker->randomElement([-1,1])
            ]);
        }
    }
}
