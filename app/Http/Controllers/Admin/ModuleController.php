<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Permissions;
use App\RoleUser;
use App\Role_has_permissions;
use App\Menu;
use App\Icon;
use App\Submenu;
use Auth;
use DB;
class ModuleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(access('module','view')  == true){
            $icon = Icon::All();
            return view('admin.module.index', compact('icon'));
        }
        else
        {
            return back();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         if(access('module','view')  == true){
           return view('admin.module.create');
        }
        else
        {
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
   
        if(access('module','create')  == true){
         $id = Auth::id();
         $role_user_id = RoleUser::select('role_id')->where('user_id',$id)->pluck('role_id')->toArray();
         $role_id= $role_user_id[0];
            $menu = new Menu;
             $this->validate($request, [
                'name' => 'required|max:40|unique:menus',
                'display_name' => 'required|max:100',
            ]);
            $menu->name = $request->name.'_management';
            $menu->display_name = $request->display_name;
            $menu->icon = $request->icon;
            $menu->submenu = $request->submenu;
            $menu->save();
            if($request->submenu == 1){
                for($i=0; $i<count($request->submodule_name); $i++){
                    $submenu = new Submenu;
                    $submenu->menu_id = $menu->id;
                    $submenu->name = $request->submodule_name[$i];
                    $submenu->link = $request->submodule_link[$i];
                    $submenu->save();
                }
              
            }
            $role = array(strtolower($request->display_name));
            $ability = array('view','create','edit','delete');
            for($i=0; $i<count($role); $i++){
                for($j=0; $j<count($ability); $j++){
                    $permissions = new Permissions();
                    $permissions['name'] = $ability[$j].'_'.$role[$i];
                    $permissions->save();
                    $id_permissions = Permissions::select('id')->where('name',$ability[$j].'_'.$role[$i])->pluck('id')->toArray();
                    $permission= $id_permissions[0];
                    $rolepermissions = new Role_has_permissions();
                    $rolepermissions['permission_id'] =$permission;
                    $rolepermissions['role_id'] =$role_id;
                    $rolepermissions->save();
               
                }
            }
            
           return redirect()->route( 'module.index' )->with('message','Module created successfully');
        }
        else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(access('module','edit')  == true){
            $module = Menu::find($id);
            return view('admin.module.edit', compact('module'));
        }
        else{
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(access('module','edit')  == true){
            $menu = Menu::find($id);
            $menu->display_name = $request->display_name;        
            $menu->name = $request->name.'_management';        
            $menu->icon = $request->icon;       
            $menu->save(); 
            return redirect('/module');
        }
        else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(access('module','delete')  == true){
            $menu = Menu::find($id);
            $menu_name = Menu::select('name')->where('id',$id)->pluck('name')->toArray();
            $parse_menu =  substr($menu_name[0], 0, -11);
            $role = array($parse_menu);
            $ability = array('view','create','edit','delete');
            for($i=0; $i<count($role); $i++){
                for($j=0; $j<count($ability); $j++){
                    $id_permissions = Permissions::select('id')->where('name',$ability[$j].'_'.$role[$i])->pluck('id')->toArray();
                    $permissions = Permissions::find($id_permissions[0]);
                    $permissions->delete();
                    $id_role_permissions = Role_has_permissions::select('id')->where('permission_id',$id_permissions)->pluck('id')->toArray();
                    $rolepermissions = Role_has_permissions::find($id_role_permissions[0]);
                    $rolepermissions->delete();
                    
                }
            }
            $menu_sub = Menu::select('submenu')->where('id',$id)->first();
            if($menu_sub->submenu == 1){
                DB::table('submenu')->where('menu_id', $id)->delete();
            }
            $menu->delete();
            session()->flash('message','Delete Successfully');
            return redirect('/module');
        }
        else
        {
            return back();
        }
    }
    public function getData()
    {
        return Datatables::of(Menu::datatables())
        ->addColumn( 'action', function ( $module ) {
            $edit_modal = $module->id;
            $delete_url = route('module.destroy', $module->id);
            $data['empty']='';
            if(access('module','edit') == true){
                $data['edit_modal']   = $edit_modal;
            }
            if(access('module','delete')  == true){
               $data['delete_url'] = $delete_url;
            }
            return view('admin.forms.action', $data);
        })
        ->make(true);
    }

    public function getIcon(){
        $icon = Icon::All();
        return response()->json($icon);
    }
}
