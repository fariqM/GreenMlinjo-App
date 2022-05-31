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

        $product_categories = ["Promo Kilat", "Paket Buah", "Kebutuhan Pokok", "Paket Sayur", "Produk Telur", "Produk Daging", "Produk Umbian", "Produk Ikan", "Produk Susu"];

        foreach ($product_categories as $key => $value) {
            DB::table('product_categories')->insert([
                'category' =>  $value,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }


        $product = [
            [
                'title' => 'Wortel Lokal',
                'price' => 10000,
                'unit' => 'kg',
                'product_category_id' => null,
                'sub_unit' =>  'pcs',
                'description' => 'Sayur Wortel Lokal Fresh Segar Kiloan langsung diambil dari pasar induk /pasar kranji sehingga harga sangat bersaing dengan pasar lainnya serta dipilih dengan kualitas terbaik.'
            ],
            [
                'title' => 'Sayur Bit (Beetroot Red)',
                'price' => 7500,
                'unit' => '100gr',
                'sub_unit' =>  'pcs',
                'product_category_id' => null,
                'description' => 'Khasiat Buah Bit Untuk Kesehatan, Tekanan Darah , Jantung , Kanker dan Stamina:<br>
                Salah satu khasiat jus bit adalah menambah pasokan enerji, disamping itu masih banyak manfaat lain dari mengasup bit dengan cara dibuat jus, direbus sebentar untuk salad, atau dibuat pure (dihaluskan) untuk sup, dan lain-lain.',
            ],
            [
                'title' => 'Fresh Brokoli Hijau Segar Organik',
                'price' => 13000,
                'unit' => '250gr',
                'sub_unit' =>  'pcs',
                'product_category_id' => 1,
                'description' => 'Brokoli yang disediakan Sayur Kendal , sudah melalui proses Quality Control untuk memastikan, pangan ini sudah dalam kualitas terbaik, agar kamu dapat merasakan manfaat dari Brokoli, yaitu:<br>
                <br>
                1. Memelihara kesehatan jantung dan pembuluh darah<br>
                2. Memiliki potensi untuk mencegah kanker<br>
                3. Melancarkan pencernaan<br>
                4. Meningkatkan sistem kekebalan tubuh<br>
                5. Mencegah keriput<br>
                6. Meningkatkan kepadatan tulang',
            ],
            [
                'title' => 'Bayam Sayuran Segar 1 Ikat',
                'price' => 4000,
                'unit' => '1 ikat',
                'sub_unit' =>  'pcs',
                'product_category_id' => null,
                'description' => 'Bayam Segar 1 Ikat - Segar Sehat 🚩 DIKIRIM H+1 (Besok pagi) 😊 Pakai Instant Kurir agar lebih cepat sampai 📦 dari toko ke rumah Kakak agar masih segar pas sampai dirumah 😉👍',
            ],
            [
                'title' => 'Fresh Sawi Hijau Segar Organik - Sayur Kendal - 250gr',
                'price' => 4500,
                'unit' => '250gr',
                'sub_unit' =>  'bonggol',
                'product_category_id' => null,
                'description' => 'Sawi Hijau yang disediakan Sayur Kendal , sudah melalui proses Quality Control untuk memastikan, pangan ini sudah dalam kualitas terbaik',
            ],
            [
                'title' => 'Kangkung 1 Ikat',
                'price' => 2000,
                'unit' => '1 ikat',
                'sub_unit' =>  'bonggol',
                'product_category_id' => null,
                'description' => 'Kangkung 1 ikat. Berat bersih sekitar 200 🚩<br>
                <br> 
                DIKIRIM H+1 (Besok pagi) 😊 Pakai Instant Kurir agar lebih cepat sampai 📦 dari toko ke rumah Kakak agar masih segar pas sampai dirumah 😉👍',
            ],
            [
                'title' => 'Kacang Panjang',
                'price' => 1800,
                'unit' => '100gr',
                'sub_unit' =>  'pcs',
                'product_category_id' => null,
                'description' => 'Start pengiriman setiap harinya pk. 08:00 (mengikuti antrian dan sistem pengantaran)
                <br><br>
                Kami merupakan supplier utama dari banyak restaurant terkemuka di Indonesia. Kini kami hadir melayani Anda via online di Marketplace kesayangan Anda.',
            ],
            [
                'title' => 'Oyong Hijau Gambas Panjang 250gr',
                'price' => 9800,
                'unit' => '250gr',
                'sub_unit' =>  'pcs',
                'product_category_id' => 1,
                'description' => '[BnB KD INFO]<br>
                Jam Operasional Toko :<br>
                Senin-Minggu Pk. 08.00 – 17.00 WIB<br>
                <br>
                [INFO PENGIRIMAN]<br>
                1. Same day kurir:<br>
                Batasan kilogram; 5kg. Max radius pengiriman 40 km.<br>
                2. Instan Kurir:<br>
                Batasan kilogram; 20 kg. Max radius pengiriman 40 km.',
            ],
            [
                'title' => 'JAMUR ENOKI FRESH IMPORT PER PACK',
                'price' => 4000,
                'unit' => 'pack',
                'sub_unit' =>  '200gram',
                'min_qty_per_unit' =>  0,
                'max_qty_per_unit' =>  0,
                'product_category_id' => 1,
                'description' => 'Order menggunakan layanan sameday ada kemungkinan akan dikirimkan di hari berikutnya jika order masuk sesudah jam 14:00<br>
                <br>
                JAM OPERASIONAL TOKO<br>
                SENIN -- SABTU / JAM 8.00 -- 16.00<br>
                <br>
                Produk akan dikirim langsung dari gudang Cold Storage kami.<br>
                <br>
                Thank you and happy shopping at Simply Fruits! :)',
            ],
            [
                'title' => 'Sayur Pakchoy / Pak Coi / Bok Choy / Pakcoy',
                'price' => 5000,
                'unit' => '250gr',
                'sub_unit' =>  'bonggol',
                'product_category_id' => null,
                'description' => 'Organic Certified Pak Choy dengan berat 200gr per pack<br>
                <br>
                Conven berat berkisar 200 gram<br>
                +/- 10% tergantung ukuran sayuran/produk<br>
                <br>
                Baby Pakchoy pilihan dengan ukuran dan tekstur yang pas.',
            ],
            [
                'title' => 'Jahe Merah Segar dan Fresh',
                'price' => 3500,
                'unit' => '100gr',
                'sub_unit' =>  'pcs',
                'product_category_id' => 1,
                'description' => 'BARANG SELALU READY STOK!! Langsung Order biar langsung dikirim ya kak.<br>
                <br>
                Berikut adalah harga tertera untuk 1000gram jahe merah + Kemasan. Keadaan segar dan masih ada tanah kering yang menempel hanya sedikit.',
            ],
            [
                'title' => 'Paket sayur lodeh segar',
                'price' => 9000,
                'unit' => 'pack',
                'sub_unit' =>  '8 Komposisi',
                'min_qty_per_unit' =>  0,
                'max_qty_per_unit' =>  0,
                'product_category_id' => 4,
                'description' => 'Pemesanan dan pengiriman: <br>
                -Untuk pesanan yang terkonfirmasi sebelum pukul 10.00 akan dikirimkan dihari yang sama. <br>
                -Dan utk pemesanan yang terkonfirmasi SETELAH pk 10.00 pagi akan DIKIRIMKAN KEESOKAN HARINYA (H+1). <br>
                -Proses packing dan pengiriman kami lakukan BERURUTAN sesuai dengan pesanan yang masuk',
            ],
            [
                'title' => 'PAKET SAYUR SOP',
                'price' => 7000,
                'unit' => 'pack',
                'sub_unit' =>  '8 Komposisi',
                'min_qty_per_unit' =>  0,
                'max_qty_per_unit' =>  0,
                'product_category_id' => 4,
                'description' => 'MOHON DIBACA SEBELUM ORDER<br>
                * PEMBERIAN RATING 1-3 DAN ULASAN BURUK AKAN DI BLOCK USER ( TIDAK MENERIMA ORDERAN LAGI )<br>
                * JIKA BARANG JELEK ATAU RUSAK BISA SERTAKAN VIDEO UNBOXING DAN AKAN DIRETUR BARANG<br>
                * RETUR BARANG WAJIB VIDEO UNBOXING<br>
                * KOMPLAIN BARANG BISA DISELESAIKAN MELALUI CHAT<br>
                ',
            ],
            [
                'title' => 'Paket Sayur Asem / Pack',
                'price' => 7500,
                'unit' => 'pack',
                'sub_unit' =>  '6 Komposisi',
                'min_qty_per_unit' =>  0,
                'max_qty_per_unit' =>  0,
                'product_category_id' => 4,
                'description' => '[Detail Produk]<br>
                • Kacang panjang<br>
                • Daun melinjo<br>
                • Terong<br>
                • Jagung manis<br>
                • Lengkuas<br>
                • Asam segar<br>
                • Melinjo<br>
                • Pepaya muda<br>
                • Labu siam<br>
                • Daun salam<br>
                • Bawang merah<br>
                • Bawang putih<br>
                • Cabai merah keriting<br>
                • Kaldu bubuk',
            ],
            [
                'title' => 'Paket Sayur Bening bayam siap masak',
                'price' => 12000,
                'unit' => 'pack',
                'sub_unit' =>  '5 Komposisi',
                'min_qty_per_unit' =>  0,
                'max_qty_per_unit' =>  0,
                'product_category_id' => 4,
                'description' => 'paket sayur bening bayam + jagung+wortel+bawang<br>
                bumbu bawang merah + bwang putih+ royko<br>
                <br>
                Selamat datang di Attar Surya.<br>
                Kami menjaga kualitas bahan dapur anda agar selalu memberikan yang terbaik untuk pelanggan-pelanggan kami',
            ],
            [
                'title' => 'NAGET VANFOOD 1 KG FROZEN FOOD',
                'price' => 45000,
                'unit' => 'pack',
                'sub_unit' =>  '1kg',
                'product_category_id' => 1,
                'description' => 'NAGET VANFOOD 1 KG FROZEN FOOD ',
            ],
            [
                'title' => 'Minyak Goreng Bimoli 1 L ( Bahan Pokok )',
                'price' => 26800,
                'unit' => 'pack',
                'sub_unit' =>  '1 Liter',
                'min_qty_per_unit' =>  0,
                'max_qty_per_unit' =>  0,
                'product_category_id' => 3,
                'description' => 'Minyak Merk Bimoli Ukuran. 1 L
                <br>
                SPESIFIKASI :
                Minyak Merk Bimoli Ukuran. 1 L',
            ],
            [
                'title' => 'BERAS IR64 (Q1) MEDIUM QUALITY CAP KEMBANG 5Kg.',
                'price' => 49500,
                'unit' => 'pack',
                'sub_unit' =>  '5 Kg',
                'min_qty_per_unit' =>  0,
                'max_qty_per_unit' =>  0,
                'product_category_id' => 3,
                'description' => 'BERAS (IR64) Q1 CAP BUNGA<br>
                Beras Yang Biasa Digunakan Oleh Rumah Makan Sederhana Pinggir Jalan Dan Ibu Rumah Tangga Kalangan Menengah Ke Bawah.
                <br>
                Ciri Produk :<br>
                - Bersih<br>
                - Panjang<br>
                - Putih Bening (Gading)<br>
                - Nasi Sedang',
            ],
            [
                'title' => 'BERAS ROJOLELE 5 KG',
                'price' => 47000,
                'unit' => 'pack',
                'min_qty_per_unit' =>  0,
                'max_qty_per_unit' =>  0,
                'sub_unit' =>  '5 Kg',
                'product_category_id' => 3,
                'description' => 'BERAT BERAS 5 KG',
            ],
            [
                'title' => 'Paket 1 Hampers Buah - Sehat Segar - Twins Fresh',
                'price' => 99000,
                'unit' => 'pack',
                'sub_unit' =>  '2.300 Gram',
                'product_category_id' => 2,
                'min_qty_per_unit' =>  0,
                'max_qty_per_unit' =>  0,
                'description' => 'Komposisi Standar/bisa request : <br>
                1. Strawberry 200 gram (inc mika) atau kurma 250 gram <br>
                2. Apel Fuji 2 ea <br>
                3. Pir Century/Yalie 2 ea <br>
                4. Jeruk Ponkam/kino 2 ea <br>
                5. Pisang 2 ea <br>
                6. Naga 1 ea <br>
                7. Anggur merah/hijau australia 150 gram (inc mika) <br>',
            ],
            [
                'title' => 'Paket Sehat Seminggu Susu Steril Tujuh Kurma 7 Pcs',
                'price' => 65000,
                'unit' => 'pack',
                'sub_unit' =>  '7 pcs',
                'product_category_id' => 9,
                'min_qty_per_unit' =>  0,
                'max_qty_per_unit' =>  0,
                'description' => 'Komposisi Standar/bisa request : <br>
                1. Strawberry 200 gram (inc mika) atau kurma 250 gram <br>
                2. Apel Fuji 2 ea <br>
                3. Pir Century/Yalie 2 ea <br>
                4. Jeruk Ponkam/kino 2 ea <br>
                5. Pisang 2 ea <br>
                6. Naga 1 ea <br>
                7. Anggur merah/hijau australia 150 gram (inc mika) <br>',
            ],


        ];

        $images = [
            'storage/images/products/wortel.jpg',
            'storage/images/products/bit.jpg',
            'storage/images/products/brokoli.jpg',
            'storage/images/products/bayam.jpg',
            'storage/images/products/sawi.webp',
            'storage/images/products/kangkung.jpg',
            'storage/images/products/kacang_panjang.jpg',
            'storage/images/products/oyong.jpg',
            'storage/images/products/enoki.jpg',
            'storage/images/products/pakcoy.jpg',
            'storage/images/products/jahe.webp',
            'storage/images/products/lodeh.jpg',
            'storage/images/products/sop.webp',
            'storage/images/products/asem.jpg',
            'storage/images/products/bening.jpg',
            'storage/images/products/nugget.webp',
            'storage/images/products/bimoli.jpg',
            'storage/images/products/beras64.jpg',
            'storage/images/products/rojolele.jpg',
            'storage/images/products/paketbuah.jpg',
            'storage/images/products/susu.jpg',
        ];

        ///////////////////

        // [
        //     'title' => 'title',
        //     'description' => 'description',
        // ],



        DB::table('users')->insert([
            'name' => 'Bagas Wicaksono',
            'email' => 'mlinjo@gmail.com',
            'phone' => '082745556772',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);



        \App\Models\Market::factory(1)->create();
        \App\Models\Market::factory(1)->create([
            'name' => 'Pasar Keputran',
            'area_id' => 2,
        ]);
        \App\Models\Market::factory(1)->create([
            'name' => 'Pasar Pabean',
            'area_id' => 3,
        ]);

        // categories
        DB::table('categories')->insert([
            'title' => 'Paket Sedekah',
            'type' => 'promo',
            // 'due_date' => '2022-02-21',
            // 'market_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'title' => 'Promo Kilat',
            'type' => 'promo',
            // 'due_date' => '2022-02-21',
            // 'market_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'title' => 'Product Normal',
            'type' => 'promo',
            // 'due_date' => '2022-02-21',
            // 'market_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'title' => 'Promo Ramadhan',
            'type' => 'promo',
            // 'due_date' => '2022-02-21',
            // 'market_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // product table
        foreach ($product as $key => $value) {
            if (array_key_exists('min_qty_per_unit', $value)) {
                $array = [
                    'title' => $value['title'],
                    'description' => $value['description'],
                    'product_category_id' => $value['product_category_id'],
                    'min_qty_per_unit' =>  $value['min_qty_per_unit'],
                    'max_qty_per_unit' =>  $value['max_qty_per_unit'],
                    'unit' =>  $value['unit'],
                    'price' =>  $value['price'],
                    'sub_unit' =>  $value['sub_unit'],
                    'market_id' => 1,
                ];
            } else {
                $array = [
                    'title' => $value['title'],
                    'description' => $value['description'],
                    'product_category_id' => $value['product_category_id'],
                    'unit' =>  $value['unit'],
                    'price' =>  $value['price'],
                    'sub_unit' =>  $value['sub_unit'],
                    'market_id' => 1,
                ];
            }

            \App\Models\Product::factory()->create($array);
        }
        foreach ($product as $key => $value) {
            if (array_key_exists('min_qty_per_unit', $value)) {
                $array = [
                    'title' => $value['title'],
                    'description' => $value['description'],
                    'product_category_id' => $value['product_category_id'],
                    'min_qty_per_unit' =>  $value['min_qty_per_unit'],
                    'max_qty_per_unit' =>  $value['max_qty_per_unit'],
                    'unit' =>  $value['unit'],
                    'price' =>  $value['price'],
                    'sub_unit' =>  $value['sub_unit'],
                    'market_id' => 2,
                ];
            } else {
                $array = [
                    'title' => $value['title'],
                    'description' => $value['description'],
                    'product_category_id' => $value['product_category_id'],
                    'unit' =>  $value['unit'],
                    'price' =>  $value['price'],
                    'sub_unit' =>  $value['sub_unit'],
                    'market_id' => 2,
                ];
            }

            \App\Models\Product::factory()->create($array);
        }
        foreach ($product as $key => $value) {
            if (array_key_exists('min_qty_per_unit', $value)) {
                $array = [
                    'title' => $value['title'],
                    'description' => $value['description'],
                    'product_category_id' => $value['product_category_id'],
                    'min_qty_per_unit' =>  $value['min_qty_per_unit'],
                    'max_qty_per_unit' =>  $value['max_qty_per_unit'],
                    'unit' =>  $value['unit'],
                    'price' =>  $value['price'],
                    'sub_unit' =>  $value['sub_unit'],
                    'market_id' => 3,
                ];
            } else {
                $array = [
                    'title' => $value['title'],
                    'description' => $value['description'],
                    'product_category_id' => $value['product_category_id'],
                    'unit' =>  $value['unit'],
                    'price' =>  $value['price'],
                    'sub_unit' =>  $value['sub_unit'],
                    'market_id' => 3,
                ];
            }

            \App\Models\Product::factory()->create($array);
        }



        \App\Models\User::factory(4)->create();
        // \App\Models\Product::factory(50)->create();
        \App\Models\Product::factory(1)->create([
            "title" => "Paket Sembako 1",
            'unit' =>  'pack',
            "category_id" => 1,
            "description" => "Beras 2Kg, Minyak Goreng 1L, Gula 1Kg, Mie Instant 5 Bungkus.",
            "price" => 70000,
        ]);
        \App\Models\Product::factory(1)->create([
            "title" => "Paket Sembako 2",
            'unit' =>  'pack',
            "category_id" => 1,
            "description" => "Beras 5Kg, Minyak Goreng 2L, Gula 2Kg, Telur 1Kg, Mie Instant 10 Bungkus, Kecap 250Ml.",
            "price" => 150000,
        ]);
        \App\Models\Product::factory(1)->create([
            "title" => "Paket Sayur 1",
            'unit' =>  'pack',
            "category_id" => 1,
            "description" => "Terong, Manisa, Kacang Panjang, Bawang Merah, Bawang Putih, Cabe Merah Besar, Cabe Rawit, Kencur, Kemiri, Santan Kara.",
            "price" => 15000,
        ]);

        \App\Models\Product::factory(1)->create([
            "title" => "Paket Empon 1",
            'unit' =>  'pack',
            "category_id" => 3,
            "description" => "250 gram Jahe merah, 250 gram Kunyit, 250 gram Temukawak, 250 gram Kencur, 250 gram Sereh",
            "price" => 40000,
        ]);
        \App\Models\Product::factory(1)->create([
            "title" => "Paket Empon 1",
            'unit' =>  'pack',
            "category_id" => 1,
            "description" => "250 gram Jahe merah, 250 gram Kunyit, 250 gram Temukawak, 250 gram Kencur, 250 gram Sereh",
            "price" => 40000,
        ]);

        \App\Models\Product::factory(1)->create([
            "title" => "Paket Empon 2",
            'unit' =>  'pack',
            "category_id" => 3,
            "description" => "250 gram Jahe Gajah, 250 gram Kunyit, 250 gram Temukawak, 250 gram Kencur, 250 gram Sereh",
            "price" => 50000,
        ]);
        \App\Models\Product::factory(1)->create([
            "title" => "Paket Empon 2",
            'unit' =>  'pack',
            "category_id" => 1,
            "description" => "250 gram Jahe Gajah, 250 gram Kunyit, 250 gram Temukawak, 250 gram Kencur, 250 gram Sereh",
            "price" => 50000,
        ]);

        // \App\Models\Favourite::factory(10)->create();
        // \App\Models\Cart::factory(10)->create();

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

        foreach ($images as $key => $value) {
            DB::table('images')->insert([
                'imageable_type' => 'App\Models\Product',
                'imageable_id' => $key + 1,
                'content' => null,
                'url' => $value,
                'ext' => 'jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        foreach ($images as $key => $value) {
            DB::table('images')->insert([
                'imageable_type' => 'App\Models\Product',
                'imageable_id' => $key + 22,
                'content' => null,
                'url' => $value,
                'ext' => 'jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        foreach ($images as $key => $value) {
            DB::table('images')->insert([
                'imageable_type' => 'App\Models\Product',
                'imageable_id' => $key + 43,
                'content' => null,
                'url' => $value,
                'ext' => 'jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }

        for ($i = 64; $i < 71; $i++) {
            if ($i === 67 || $i ===68) {
                $url = 'storage/images/products/empon_3.jpg';
            } else if ($i === 69 || $i === 70) {
                $url = 'storage/images/products/empon4.webp';
            } else if ($i === 64 || $i === 65) {
                $url = 'storage/images/products/paket_sembako.jpg';
            } else if ($i === 66) {
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
