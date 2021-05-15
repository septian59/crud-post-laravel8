<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect(['Bug', 'Help', 'Foundation', 'Backend']);
        $tags->each(function ($c) {
            Tag::create([
                'name' => $c,
                'slug' => Str::slug($c),
            ]);
        });
    }
}
