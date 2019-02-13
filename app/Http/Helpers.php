<?php  

use App\Role;
use App\RoleUser;
use App\User;
use App\Menu;
use App\Role_has_permissions;
use App\Permissions;
use App\Submenu;

function permission_val($id,$permission)
{
	$role = Role::find($id);
	$format = json_decode($role['permissions'],true);
	$result = ( ( isset($format[$permission]) ) ? 1 : 0);
  return $result;
}
function name_user(){
	$id = Auth::id();
	$name_user = User::select('name')->where('id',$id)->pluck('name')->toArray();
	$name = $name_user[0];
	echo $name;
}
function role_user(){
	$id = Auth::id();
	$role_user_id = RoleUser::select('role_id')->where('user_id',$id)->pluck('role_id')->toArray();
	$role_id= $role_user_id[0];
	$permissions =Role::select('name')->where('id',$role_id)->pluck('name')->toArray();
	echo $permissions[0];
}
function photo_user(){
	$id = Auth::id();
	$image_user = User::select('image')->where('id',$id)->pluck('image')->toArray();
	$image = $image_user[0];
	echo asset('uploads/profiles').'/'.$image;
}
function active_dashboard(){
	$url = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
	if($url == 'home' ){
		echo 'active';
		}
	else{
		echo '';
	}
}


function sidebar_akses(){
	$url = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
	$id = Auth::id();
	$role_user_id = RoleUser::select('role_id')->where('user_id',$id)->pluck('role_id')->toArray();
	$role_id= $role_user_id[0];
	$permissions =Role_has_permissions::select('permission_id')->where('role_id',$role_id)->pluck('permission_id')->toArray();
	for($i=0; $i<count($permissions);$i++){
		$ability[]=Permissions::select('name')->where('id',$permissions[$i])->where('name','like','%view%')->pluck('name')->First();
	}
	$filter=array_filter($ability);
	foreach($filter as $key =>$value ){
		$display = substr($value, strpos($value, "_") + 1);  
		$display_name = Menu::select('display_name')->where('name','like','%'.$display.'%')->pluck('display_name')->First();
		$menu_icon = Menu::select('icon')->where('name','like','%'.$display.'%')->pluck('icon')->toArray();
		if(isset($menu_icon[0])){
					$icon = $menu_icon[0]; 

		}
		$menu_submenu = Menu::select('submenu','id')->where('name','like','%'.$display.'%')->first();
		$menu_id = $menu_submenu->id;
		$submenu = $menu_submenu->submenu; 

		if($url == $display ){
			$active = 'active';
		}
		else{
			$active = '';
		}
        if($submenu == '1'){
        	$display_submenu = Submenu::select('name','link')->where('menu_id',$menu_id)->get();
    		echo '<li style="display: inline" class="treeview '.$active.'">';
	        echo '<a href="#">';
	        echo '<i class="'.$icon.'"></i>';
	        echo '<span>'.$display_name.'</span>';
	        echo '</a>';
	        echo '<ul class="treeview-menu">';
        	foreach($display_submenu as $result){
        		echo  '<li><a href="/'.$result->link.'"><i class="fa fa-circle-o"></i>'.$result->name.'</a></li>';
        	}
	        echo '</ul>';
	        echo '</li>';
        }
        else{
    		echo '<li style="display: inline" class="'.$active.'">';
		    echo '<a href="'.url($display).'">';
		    echo '<i class="'.$icon.'"></i>';
		    echo '<span>'.$display_name.'</span>';
		    echo '</a>';
		    echo '</li>';
        }
     
	}

}
function access($base,$access){
	$id = Auth::id();
	$role_user_id = RoleUser::select('role_id')->where('user_id',$id)->pluck('role_id')->toArray();
	$role_id= $role_user_id[0];
	$permissions =Role_has_permissions::select('permission_id')->where('role_id',$role_id)->pluck('permission_id')->toArray();
	for($i=0; $i<count($permissions);$i++){
		$ability[]=Permissions::select('name')->where('id',$permissions[$i])->where('name','like','%'.$access.'%')->pluck('name')->First();
	}
	$filter=array_filter($ability);
		foreach($filter as $key =>$value){
		$menu[]= substr($value, strpos($value, "_") + 1);  
	}
	if(in_array($base,$menu)){
		return true;
	}else
	{
		return false;
	}
	
}


function total_user(){
	return User::count();
}

function total_visitor(){
	$home = Counter::showAndCount('home');
	$profile = Counter::showAndCount('/');
	$template = Counter::showAndCount('template');

	$total = $home+$profile+$template;
	return $total;
}


?>