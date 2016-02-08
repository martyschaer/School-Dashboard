<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Insert Users
        DB::table('users')->insert([
            'email' => 'admin.admin@admin.com',
            'password' => bcrypt('admin'),
            'is_admin' => 1
        ]);
    }
}
