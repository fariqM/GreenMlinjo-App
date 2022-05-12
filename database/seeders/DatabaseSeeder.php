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
        \App\Models\Cart::factory(10)->create();
        \App\Models\Market::factory(3)->create();

        // categories
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

        // vouchers
        DB::table('vouchers')->insert([
            'title' => 'Diskon Pengguna Baru',
            'subtitle' => 'Voucher diskon pembelian 15%',
            'description' => 'Potongan harga 15% tanpa minimal pembelian, maksimal sampai dengan Rp30.000.',
            'voucher_type' => 'product',
            'discount' => 15,
            'discount_type' => 'percent',
            'max_value' => 30000,
            'min_qty' => null,
            'exp' => "2022-05-28",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('vouchers')->insert([
            'title' => 'Gratis Ongkir Tanpa Syarat',
            'subtitle' => 'Voucher diskon ongkir Rp10.000',
            'description' => 'Potongan biaya pengiriman Rp10.000 untuk pengguna baru',
            'voucher_type' => 'shipping',
            'discount' => 10000,
            'discount_type' => 'price',
            'max_value' => null,
            'min_qty' => null,
            'exp' => "2022-05-28",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // DB::table('vouchers')->insert([
        //     'title' => 'Diskon pengguna baru',
        //     'subtitle' => 'Potongan harga Rp 30.000 tanpa minimal pembelian',
        //     'description' => 'Diskon pengguna baru',
        //     'voucher_type' => 'product',
        //     'discount' => 100,
        //     'discount_type' => 'percent',
        //     'max_value' => 30000,
        //     'min_qty' => null,
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        // ]);

        for ($i = 1; $i < 51; $i++) {
            DB::table('images')->insert([
                'imageable_type' => 'App\Models\Product',
                'imageable_id' => $i,
                'content' => null,
                'url' => 'storage/images/products/wortel.jpg',
                'ext' => 'jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
