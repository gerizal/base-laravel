<?php

use Illuminate\Database\Seeder;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('menus')->truncate();
      DB::insert("
        INSERT INTO `menus` (`id`, `name`,`display_name`,`icon`,`submenu`)
        VALUES
          (1, 'user_management', 'Admin List','fa fa-user-o','0'),
          (2, 'role_management', 'Role Management','fa fa-key','0'),
          (3, 'module_management', 'Module Management','fa fa-gear','0')
       ");
    }
}
