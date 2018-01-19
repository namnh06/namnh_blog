<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategoriesTableSeeder extends Seeder
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
        $arr = ['PHP','JavaScript','CSS','HTML','Linux'];
        for($i = 0; $i < count($arr); $i++){
            Category::create([
                'name'=>$arr[array_rand($arr)],
                'status'=>$faker->randomElement([-1,1])
            ]);
        }
    }
}
