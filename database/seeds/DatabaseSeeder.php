<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => "admin@admin.com",
            'username' => 'administrator',
            'password' => bcrypt('admin'),
            'location' => 'Local',
            'class' => 4
        ]);
        DB::table('videos')->insert([
            'title' => "Laravel 5.2 PHP Build a social network - Setup & Introduction",
            'category' => 1,
            'vidid' => '_dd4-HEPejU',
            'description' => 'This is a laravel video.',
            'published' => 1,
            'publisher' => 1
        ]);
        DB::table('video_categories')->insert([
            'catename' => "default"
        ]);
    }
}
