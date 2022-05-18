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
            'name' => 'Bagas Wicaksono',
            'email' => 'mlinjo@gmail.com',
            'phone' => '082745556772',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\Market::factory(3)->create();

        // categories
        DB::table('categories')->insert([
            'title' => 'Paket Sedekah',
            'type' => 'promo',
            // 'due_date' => '2022-02-21',
            'market_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'title' => 'Promo Kilat',
            'type' => 'promo',
            // 'due_date' => '2022-02-21',
            'market_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'title' => 'Product Normal',
            'type' => 'promo',
            // 'due_date' => '2022-02-21',
            'market_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'title' => 'Promo Ramadhan',
            'type' => 'promo',
            // 'due_date' => '2022-02-21',
            'market_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        \App\Models\User::factory(4)->create();
        \App\Models\Product::factory(50)->create();
        \App\Models\Product::factory(1)->create([
            "title" => "Paket Sembako 1",
            "category_id" => 1,
            "description" => "Beras 2Kg, Minyak Goreng 1L, Gula 1Kg, Mie Instant 5 Bungkus.",
            "price" => 70000,
        ]);
        \App\Models\Product::factory(1)->create([
            "title" => "Paket Sembako 2",
            "category_id" => 1,
            "description" => "Beras 5Kg, Minyak Goreng 2L, Gula 2Kg, Telur 1Kg, Mie Instant 10 Bungkus, Kecap 250Ml.",
            "price" => 150000,
        ]);
        \App\Models\Product::factory(1)->create([
            "title" => "Paket Sayur 1",
            "category_id" => 1,
            "description" => "Terong, Manisa, Kacang Panjang, Bawang Merah, Bawang Putih, Cabe Merah Besar, Cabe Rawit, Kencur, Kemiri, Santan Kara.",
            "price" => 15000,
        ]);

        \App\Models\Product::factory(1)->create([
            "title" => "Paket Empon 1",
            "category_id" => 3,
            "description" => "250 gram Jahe merah, 250 gram Kunyit, 250 gram Temukawak, 250 gram Kencur, 250 gram Sereh",
            "price" => 40000,
        ]);
        \App\Models\Product::factory(1)->create([
            "title" => "Paket Empon 1",
            "category_id" => 1,
            "description" => "250 gram Jahe merah, 250 gram Kunyit, 250 gram Temukawak, 250 gram Kencur, 250 gram Sereh",
            "price" => 40000,
        ]);

        \App\Models\Product::factory(1)->create([
            "title" => "Paket Empon 2",
            "category_id" => 3,
            "description" => "250 gram Jahe Gajah, 250 gram Kunyit, 250 gram Temukawak, 250 gram Kencur, 250 gram Sereh",
            "price" => 50000,
        ]);
        \App\Models\Product::factory(1)->create([
            "title" => "Paket Empon 2",
            "category_id" => 1,
            "description" => "250 gram Jahe Gajah, 250 gram Kunyit, 250 gram Temukawak, 250 gram Kencur, 250 gram Sereh",
            "price" => 50000,
        ]);

        \App\Models\Favourite::factory(10)->create();
        \App\Models\Cart::factory(10)->create();

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

        DB::table('balances')->insert([
            'user_id' => 1,
            'balance' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        for ($i = 1; $i < 58; $i++) {
            if ($i === 54 || $i === 55) {
                $url = 'storage/images/products/empon_3.jpg';
            } else if ($i === 56 || $i === 57) {
                $url = 'storage/images/products/empon4.webp';
            } else if ($i === 51 || $i === 52) {
                $url = 'storage/images/products/paket_sembako.jpg';
            } else if ($i === 53) {
                $url = 'storage/images/products/paket_sayur.jpg';
            } else {
                $url = 'storage/images/products/wortel.jpg';
            }

            DB::table('images')->insert([
                'imageable_type' => 'App\Models\Product',
                'imageable_id' => $i,
                'content' => null,
                'url' => $url,
                'ext' => 'jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('infaqs')->insert([
            'collected' => 6500000,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
