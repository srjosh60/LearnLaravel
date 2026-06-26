<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'HSRM Kaos Basic',
                'description' => 'Kaos basic premium dengan bahan cotton combed 30s, slim fit, nyaman dipakai sehari-hari. Tersedia dalam berbagai pilihan warna.',
                'price' => 129000,
                'category' => 'T-Shirt',
                'image' => 'kaos.png',
                'status' => 'available',
            ],
            [
                'name' => 'HSRM Polo Shirt',
                'description' => 'Polo shirt premium dengan bahan lacoste berkualitas, cocok untuk tampilan casual maupun semi-formal. Desain slim fit yang elegan.',
                'price' => 189000,
                'category' => 'Polo Shirt',
                'image' => 'polo.png',
                'status' => 'available',
            ],
            [
             
                'name' => 'HSRM Kemeja Casual',
                'description' => 'Kemeja casual dengan bahan katun premium, desain simple dan minimalis cocok untuk tampilan sehari-hari.',
                'price' => 219000,
                'category' => 'Kemeja',
                'image' => 'kemeja.png',
                'status' => 'available',
            ],
            [
                'name' => 'HSRM Celana Formal',
                'description' => 'Celana formal slim fit dengan bahan premium, cocok untuk tampilan semi-formal dan formal.',
                'price' => 259000,
                'category' => 'Pants',
                'image' => 'formal.png',
                'status' => 'available',
            ],
            [
                'name' => 'HSRM Celana Chino',
                'description' => 'Celana chino slim fit dengan bahan twill premium, nyaman dan stylish untuk berbagai kesempatan.',
                'price' => 229000,
                'category' => 'Pants',
                'image' => 'chino.png',
                'status' => 'available',
            ],
            [
                'name' => 'HSRM Artem Series',
                'description' => 'Koleksi Artem Series dari HSRM, perpaduan style casual dan semi-formal dengan bahan premium pilihan.',
                'price' => 299000,
                'category' => 'Series',
                'image' => 'artem.png',
                'status' => 'available',
               
            ],
        ]);
    }
}