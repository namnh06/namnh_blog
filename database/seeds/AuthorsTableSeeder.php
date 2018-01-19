<?php

use Illuminate\Database\Seeder;
use App\Models\Author;
class AuthorsTableSeeder extends Seeder
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
        
        for($i = 0; $i < 20; $i++){
            Author::create([
                'name'=>$faker->name,
                'status'=>$faker->randomElement([-1,1])
            ]);
        }
    }
}
