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
                'slug' => \Illuminate\Support\Str::slug('Подписка на канал А1'),
                'name' => 'Подписка на канал А1',
                'description' => 'Тестовое описание для первого канала, где рассказывается о первом канале А1',
                'cost' => 250,
                'invite_link' => 'https://t.me/joinchat/AAAAAFlCMN7Loxx_mUup2A',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => \Illuminate\Support\Str::slug('Подписка на канал А2'),
                'name' => 'Подписка на канал А2',
                'description' => 'Еще одно тестовое описание для канал под номером 2, который называется А2',
                'cost' => 250,
                'invite_link' => 'https://t.me/joinchat/AAAAAFlCMN7Loxx_mUup2A',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        /*DB::table('product_telegram_channels')->insert([
            [
                'product_id' => 1,
                'invite_link' => 'https://t.me/joinchat/AAAAAFlCMN7Loxx_mUup2A'
            ],
            [
                'product_id' => 2,
                'invite_link' => 'https://t.me/joinchat/AAAAAFlCMN7Loxx_mUup2A'
            ]
        ]);*/
    }
}
