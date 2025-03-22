<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // List of available images
        $images = [
            'product-img-1.jpg', 'product-img-2.jpg', 'product-img-3.jpg', 'product-img-4.jpg',
            'product-img-5.jpg', 'product-img-6.jpg', 'product-img-7.jpg', 'product-img-8.jpg',
            'product-img-9.jpg', 'product-img-10.jpg',
        ];

        for ($i = 0; $i < 50; $i++) {
            $name = $faker->word() . ' ' . $faker->word();
            $slug = fake()->unique()->slug();

            Product::create([
                'name' => $name,
                'category_id' => $faker->numberBetween(1, 50),
                'weight' => $faker->randomFloat(2, 0.1, 2),
                'sizes' => json_encode(['small', 'medium', 'large']),
                'colors' => json_encode(['red', 'green', 'blue']),
                'image' => json_encode([$faker->randomElement($images)]),
                'description' => $faker->sentence(),
                'price' => $faker->randomFloat(2, 5, 100),
                'sale_price' => $faker->optional()->randomFloat(2, 5, 100),
                'product_code' => strtoupper($faker->unique()->bothify('???###')),
                'product_sku' => strtoupper($faker->unique()->bothify('???###-SMALL-RED')),
                'stock' => $faker->randomNumber(2),
                'slug' => $slug,
                'meta_title' => $name,
                'meta_description' => $faker->sentence(),
            ]);
        }
    }
}
