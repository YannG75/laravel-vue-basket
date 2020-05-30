<?php

use App\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $min = 10;
        $max = 150;
        $faker = Faker::create('fr_FR');
        $Faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            $post = new Product();
            $post->name = $Faker->streetName;
            $post->description = $faker->realText(250);
            $post->price = $faker->numberBetween($min, $max);
            $post->save();
        }
    }
}
