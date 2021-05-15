<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect(['Framework', 'PHP', 'HTML']);
        $categories->each(function ($c) {
            Category::create([
                'name' => $c,
                'slug' => Str::slug($c),
            ]);
        });
    }
}
