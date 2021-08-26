<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->truncate();

        DB::table('articles')->insert([
            'user_id' => '1',
            'title' => 'testタイトル',
            'slug' => 'test',
            'body' => '今日は晴れでした',
        ]);

        DB::table('articles')->insert([
            'user_id' => '1',
            'title' => 'testタイトル',
            'slug' => 'test',
            'body' => '今日は晴れでした',
        ]);

        DB::table('articles')->insert([
            'user_id' => '1',
            'title' => 'testタイトル',
            'slug' => 'test',
            'body' => '今日は晴れでした',
        ]);

        DB::table('articles')->insert([
            'user_id' => '1',
            'title' => 'testタイトル',
            'slug' => 'test',
            'body' => '今日は晴れでした',
        ]);
    }
}
