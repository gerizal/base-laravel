<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Menu;
use App\RoleUser;
use App\Permissions;
use App\Role_has_permissions;
use Yajra\Datatables\Datatables;
use Auth;
use DB;


class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * function to go to page of role management 
     * @author Rizal <wage.rizal@smooets.com>
     * @param 
     * @return void
     */
    public function index()
    {
        if(access('role','view')  == true){
            $roles = Role::all();
            return view('admin.roles.index', compact('roles'));
        }
        else
        {
            return back();
        }
    }

     /**
     * function to go to create page of role management 
     * @author Rizal <wage.rizal@smooets.com>
     * @param 
     * @return void
     */
    public function create()
    {
       if ( access('role','create') == TRUE){
            $permissions = Permissions::All();
            return view('admin.roles.create', compact('permissions'));
        }
        else{
            return back();
        }
    }

    /**
     * function to store role data from create page to database
     * @author Rizal <wage.rizal@smooets.com>
     * @param request
     * @return void
     */
    public function store(Request $request)
    {
        if(access('role','create')  == true){
            $role = new Role;
             $this->validate($request, [
                'name' => 'required|max:255|unique:roles,slug'
            ]);
            $role->slug = str_slug($request->name);
            $role->name = $request->name;
            $role->save();
            $data_permissions = $request->permission;
           
            $hitungdata =count($data_permissions);
            for ($i=0; $i<$hitungdata;$i++){
                $permissions = new Role_has_permissions();
                $permissions['permission_id']=$data_permissions[$i];
                $permissions['role_id'] = $role->id;
                $permissions->save();   
            }
            
           return redirect()->route( 'role.index' )->with('message','Role created successfully');
        }
        else{
            return back();
        }
    }

   /**
     * function to go to edit page of role management 
     * @author Rizal <wage.rizal@smooets.com>
     * @param id
     * @return void
     */
    public function edit($id)
    {
        if(access('role','edit')  == true){
            $data_permission = Role_has_permissions::select('permission_id')->where('role_id',$id)->pluck('permission_id')->toArray();
            $permissions = Permissions::All();
            $menu = Menu::get();
            $role = Role::find($id);
            return view('admin.roles.edit', compact('role','data_permission','permissions','menu'));
        }
        else{
            return back();
        }
    }

    /**
     * function to update data role management 
     * @author Rizal <wage.rizal@smooets.com>
     * @param 
     * @return void
     */
    public function update(Request $request, $id)
    {
        if(access('role','edit')  == true){
            $role = Role::find($id);
            $data_permission = Role_has_permissions::where('role_id',$id)->delete();
            $this->validate($request, [
                'name' => 'required|max:255'
            ]);
            $role['name'] = $request->name;
            $role['slug'] = str_slug($request->name);
            $role->save();

            $data_permissions = $request->permission;
           
            $hitungdata =count($data_permissions);
            for ($i=0; $i<$hitungdata;$i++){
                $permissions = new Role_has_permissions();
                $permissions['permission_id']=$data_permissions[$i];
                $permissions['role_id'] = $role->id;
                $permissions->save();   
            }
            
            session()->flash('message','Update Successfully');
            return redirect('/role');   
        }
        else{
            return back();
        }
    }

     /**
     * function to remove role  
     * @author Rizal <wage.rizal@smooets.com>
     * @param 
     * @return void
     */
    public function destroy($id)
    {
        //
        if(access('role','delete')  == true){
            $role = Role::find($id);
        
            $role->delete();
            session()->flash('message','Delete Successfully');
            return redirect('/role');
        }
        else
        {
            return back();
        }
    }
     /**
     * function to get data from database for datatable 
     * @author Rizal <wage.rizal@smooets.com>
     * @param 
     * @return void
     */
    public function getData()
    {
        return Datatables::of(Role::datatables())
        ->addColumn( 'action', function ( $role ) {
            $edit_url = route('role.edit', $role->id );
            $delete_url = route('role.destroy', $role->id);

             $data['empty']='';
            if(access('role','edit')  == true){
                $data['edit_url']   = $edit_url;
            }
            if(access('role','delete')  == true){
               $data['delete_url'] = $delete_url;
            }
            return view('admin.forms.action', $data);
        })
        ->make(true);
    }
}
