<?php

use Illuminate\Database\Seeder;
use App\Role_has_permissions;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('role_has_permissions')->truncate();
        for($i=1; $i<=12; $i++){
        	$permissions = new Role_has_permissions;
        	$permissions->permission_id = $i;
        	$permissions->role_id = '1';
        	$permissions->save();
        }
    }
}
