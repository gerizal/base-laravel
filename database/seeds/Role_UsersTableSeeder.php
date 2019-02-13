<?php

use Illuminate\Database\Seeder;
use App\RoleUser;
class Role_UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('role_users')->truncate();
        RoleUser::create([
            'id' => '1',
            'role_id' => '1',
            'user_id' => '1',
            'created_at' => '2017-10-31 19:54:38',
            'updated_at' => '2017-10-31 19:54:38',
        ]);
    }
}
