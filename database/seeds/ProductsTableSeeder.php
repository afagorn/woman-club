<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'slug' => \Illuminate\Support\Str::slug('Подписка на один канал'),
                'name' => 'Подписка на один канал',
                'description' => 'Тестовое описание для товара, где можно купить только один канал',
                'cost' => 250,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => \Illuminate\Support\Str::slug('Подписка на два канала'),
                'name' => 'Подписка на два канала',
                'description' => 'Еще одно тестовое описание товара, но тут уже можно купить два канала, а не один',
                'cost' => 500,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
