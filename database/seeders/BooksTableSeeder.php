<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('books')->insert([
            'title'       => 'War of the Worlds',
            'description' => 'A science fiction masterpiece about Martians invading London',
            'author'      => 'Wells, H. G.',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);

        DB::table('books')->insert([
            'title'       => 'A Winkle in Time',
            'description' => 'A young girl goes on a mission to save her father who has gone
            missing after working on a mysterious project called a tesseract.',
            'author'      => 'Madeleine L\'Engle',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
    }
}
