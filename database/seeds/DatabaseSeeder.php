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
  		/**
       * Access Control
       */
      $this->call(UsersTableSeeder::class);
      $this->call(Role_UsersTableSeeder::class);
      $this->call(MenusSeeder::class);
      $this->call(RoleTableSeeder::class);
      $this->call(PermissionsSeeder::class);
      $this->call(RolePermissionSeeder::class);
      $this->call(IconSeeder::class);      
    }
}
