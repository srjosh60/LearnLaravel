<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        Article::insert([
            [
                'title' => 'Koleksi Terbaru HSRM 2026: Simple, Slim Fit & Elegan',
                'content' => 'HSRM kembali hadir dengan koleksi terbaru yang mengedepankan gaya simple, slim fit, dan elegan. Koleksi ini dirancang khusus untuk pria modern usia 17-35 tahun yang ingin tampil stylish tanpa berlebihan. Setiap piece menggunakan bahan premium pilihan yang nyaman dipakai seharian. Tersedia dalam berbagai pilihan warna netral yang mudah dipadukan.',
                'category' => 'Koleksi',
                'image' => 'artikel1.jpeg',
                'author' => 'Tim HSRM',
            ],
            [
                'title' => 'Tips Mix & Match Outfit HSRM untuk Tampilan Casual & Semi-Formal',
                'content' => 'Tampil stylish tidak harus mahal! Dengan produk HSRM, kamu bisa menciptakan berbagai kombinasi outfit yang keren. Coba padukan Kaos Basic HSRM dengan Celana Chino untuk tampilan casual sehari-hari. Atau kombinasikan Polo Shirt dengan Celana Formal untuk tampilan semi-formal yang tetap nyaman. Tambahkan sneakers putih untuk melengkapi penampilan kamu.',
                'category' => 'Tips Fashion',
                'image' => 'artikel2.jpeg',
                'author' => 'Tim HSRM',
            ],
            [
                'title' => 'HSRM Kini Hadir di Shopee, Tokopedia & TikTok Shop!',
                'content' => 'Kabar gembira untuk para fashion enthusiast! HSRM kini tersedia di tiga platform marketplace terbesar di Indonesia yaitu Shopee, Tokopedia, dan TikTok Shop. Dapatkan berbagai promo eksklusif, gratis ongkir, dan flash sale setiap minggunya. Follow akun media sosial kami di Instagram dan TikTok untuk tidak ketinggalan update koleksi terbaru dan promo menarik dari HSRM.',
                'category' => 'Berita',
                'image' => 'artikel3.jpeg',
                'author' => 'Tim HSRM',
            ],
            [
                'title' => 'Mengenal Bahan Premium HSRM: Kualitas Terbaik untuk Kenyamanan Maksimal',
                'content' => 'Di HSRM, kualitas adalah prioritas utama kami. Setiap produk dibuat menggunakan bahan-bahan premium pilihan yang telah melalui seleksi ketat. Kami menggunakan cotton combed 30s untuk kaos basic, lacoste premium untuk polo shirt, twill berkualitas untuk celana chino, dan bahan formal premium untuk kemeja. Semua produk dirancang dengan desain slim fit yang pas di badan untuk tampilan yang lebih rapi dan stylish.',
                'category' => 'Info Brand',
                'image' => 'artikel4.jpeg',
                'author' => 'Tim HSRM',
            ],
        ]);
    }
}