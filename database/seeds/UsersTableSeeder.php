<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        User::create([
            'name' => 'Marvelous',
            'email' => 'admin@admin.com',
            'password' => bcrypt('Today1234'),
            'status' => '1',
            'image' => 'admin.png',
            'created_at' => Carbon::now(),
        ]);
        
    }
}
