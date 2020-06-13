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
                'slug' => \Illuminate\Support\Str::slug('Марафон "Базовый"'),
                'name' => 'Марафон "Базовый"',
                'description' => 'Марафон типа "Базовый", который будет проходить в июне',
                'cost' => 440,
                'invite_link' => '---',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => \Illuminate\Support\Str::slug('Марафон "Стандартный"'),
                'name' => 'Марафон "Стандартный"',
                'description' => 'Марафон "Стандартный", который будет проходить в июне',
                'cost' => 900,
                'invite_link' => '---',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => \Illuminate\Support\Str::slug('Марафон "Продвинутый"'),
                'name' => 'Марафон "Продвинутый"',
                'description' => 'Марафон типа "Продвинутый", который будет проходить в июне',
                'cost' => 1590,
                'invite_link' => '---',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
