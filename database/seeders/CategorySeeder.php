<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['nama_kategori' => 'Pengumuman'],
            ['nama_kategori' => 'Prestasi'],
            ['nama_kategori' => 'Kegiatan'],
            ['nama_kategori' => 'Pembelajaran'],
            ['nama_kategori' => 'Olahraga'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}