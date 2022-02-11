<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'mlinjo',
            'email' => 'mlinjo@gmail.com',
            'phone' => '1123123123',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory(4)->create();
        \App\Models\Product::factory(50)->create();
        \App\Models\Favourite::factory(10)->create();
        \App\Models\Market::factory(3)->create();


        DB::table('categories')->insert([
            'title' => 'Promo Kilat',
            'type' => 'promo',
            'due_date' => '2022-02-21',
            'market_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'title' => 'Promo Spesial',
            'type' => 'promo',
            'due_date' => '2022-02-21',
            'market_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'title' => 'Promo Ramadhan',
            'type' => 'promo',
            'due_date' => '2022-02-21',
            'market_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        for ($i = 1; $i < 51; $i++) {
            DB::table('images')->insert([
                'user_id' => null,
                'product_id' => $i,
                'content' => null,
                'path' => 'storage/images/wortel.jpg',
                'ext' => 'jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
