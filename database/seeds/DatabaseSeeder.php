<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

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
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'is_admin' => 1
        ]);

        DB::table('users')->insert([
            'email' => 'user@user.com',
            'password' => bcrypt('user'),
            'is_admin' => 0
        ]);

        //Insert example tasks
        for($i = 1; $i < 20; $i++) {
            DB::table('tasks')->insert([
                'description' => 'Task number ' . $i,
                'is_done' => $i % 2,
                'user_id' =>  User::all()->random(1)->id
            ]);
        }
    }
}
