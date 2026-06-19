<?php

namespace Database\Seeders;

use App\Models\Projects;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Projects::insert([
            [
                'title' => 'Sistem ERP',
                'description' => 'Sistem ERP untuk perusahaan manufaktur',
                'teknologi' => 'PHP, Laravel, MySQL',
                'image' => 'erp.png',
                'status' => 'Selesai',
            ],
            [
                'title' => 'Sistem HRIS',
                'description' => 'Sistem HRIS untuk perusahaan manufaktur',
                'teknologi' => 'PHP, Laravel, MySQL',
                'image' => 'hris.png',
                'status' => 'On Progress',
            ],
            [
                'title' => 'Sistem SCM',
                'description' => 'Sistem SCM untuk perusahaan manufaktur',
                'teknologi' => 'PHP, Laravel, MySQL',
                'image' => 'scm.png',
                'status' => 'On Progress',
            ],
            [
                'title' => 'Sistem WMS',
                'description' => 'Sistem WMS untuk perusahaan manufaktur',
                'teknologi' => 'PHP, Laravel, MySQL',
                'image' => 'wms.png',
                'status' => 'Selesai',
            ]
        ]);
    }
}