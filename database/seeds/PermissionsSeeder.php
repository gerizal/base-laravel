<?php

use Illuminate\Database\Seeder;
use App\Permissions;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();
    	$role = array('user','role','module');
    	$ability = array('view','create','edit','delete');
        //user permissions
        for($i=0; $i<count($role); $i++){
        	for($j=0; $j<count($ability); $j++){
        		$permissions = new Permissions();
        		$permissions['name'] = $ability[$j].'_'.$role[$i];
        		$permissions->save();
        	}
        }
    }
}
