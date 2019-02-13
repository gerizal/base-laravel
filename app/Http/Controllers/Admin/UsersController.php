<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\User;
use App\Role;
use App\RoleUser;
use Auth;
use DB;
use Response;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
     /**
     * function to go to user management page
     * @author Rizal <wage.rizal@tech.com>
     * @param  
     * @return void
     */

    public function index()
    {
        if(access('user','view')  == true){
            $users = User::select('users.id','users.name','users.email',DB::raw('(CASE WHEN users.status = 1 THEN "Active" ELSE "Inactive" END) AS status'),'roles.name as role')->join('role_users','role_users.user_id','=','users.id')->join('roles','roles.id','=','role_users.role_id')->get();
             $roles = Role::where('slug','!=','superadmin')->pluck('name','id')->toArray();
            return view('admin.users.index', compact('users','roles'));
        }
        else
        {
            return back();
        }

        
    }

     /**
     * function to go to create user page
     * @author Rizal <wage.rizal@tech.com>
     * @param  
     * @return void
     */

    public function create()
    {
        if ( access('user','create') == TRUE){
            $roles = Role::where('slug','!=','superadmin')->pluck('name','id')->toArray();
            return view('admin.users.create', compact('roles'));
        }
        else{
            return back();
        }
    }

      /**
     * function to store data user
     * @author Rizal <wage.rizal@smooets.com>
     * @param  request
     * @return void
     */

    public function store(Request $request)
    {

       if(access('user','create')  == true){

           $rules = array (
            'fname' => 'required|alpha',
            'email' => 'required|email',
            'password' => 'required|min:8',
            );
            $validator = Validator::make ( Input::all (), $rules );
            if ($validator->fails ())
                return Response::json ( array (
                        
                        'errors' => $validator->getMessageBag ()->toArray () 
                ) );
            else {
                $role_user = new RoleUser;
                $data = new User;
                $data->name = $request->fname;
                $data->email = $request->email;
                $data->status = $request->status;
                $data->password = bcrypt($request->password);
                $data->save ();
                if($request->status == 1){
                    $status_user = 'Active';
                }else{
                    $status_user = 'Inactive';
                }

                $role_user->role_id = $request->role;
                $role_user->user_id = $data->id;
                $role_user->save();
                $role = Role::find($request->role);
                $result = array(
                    'user' => $data,
                    'role' => $role_user,
                    'role_user' => $role,
                    'status_user' => $status_user,
                    'message' => 'User created succesfully',
                );

                return response ()->json ($result);
            }
        }
        else
        {
            return back();
        }
    }

  /**
     * function to go to edit user page
     * @author Rizal <wage.rizal@smooets.com>
     * @param  id
     * @return void
     */

    public function edit($id)
    {
        if(access('user','edit')  == true){
        //$role_user = RoleUser::select('role_id')->where('user_id',$id)->pluck('role_id')->toArray();
        //$role_id = $role_user[0];
            $roles = Role::where('id','!=','superadmin')->pluck('name','id')->toArray();
            $user = User::find($id);
            return view('admin.users.edit', compact('user','roles'));
        }
         else
        {
            return back();
        }
    }

      /**
     * function to go to update data 
     * @author Rizal <wage.rizal@smooets.com>
     * @param  request, id
     * @return void
     */

    public function update(Request $request)
    {
       if(access('user','edit')  == true){

           $rules = array (
            'fname' => 'required|alpha',
            'email' => 'required|email',
            'password' => 'required|min:8',
            );
            $validator = Validator::make ( Input::all (), $rules );
            if ($validator->fails ())
                return Response::json ( array (
                        
                        'errors' => $validator->getMessageBag ()->toArray () 
                ) );
            else {
                $role_user = RoleUser::where('user_id',$request->id)->first();
                $data = User::find ( $request->id );
                $data->name = ($request->fname);
                $data->email = ($request->email);
                $data->status = ($request->status);
                $data->password = bcrypt($request->password);
                $data->save ();
                if($request->status == 1){
                    $status_user = 'Active';
                }else{
                    $status_user = 'Inactive';
                }

                $role_user->role_id = $request->role;
                $role_user->user_id = $request->id;
                $role_user->save();
                $role = Role::find($request->role);
                $result = array(
                    'user' => $data,
                    'role' => $role_user,
                    'role_user' => $role,
                    'status_user' => $status_user,
                    'message' => 'User updated succesfully',
                );

                return response ()->json ($result);
            }
        }
        else
        {
            return back();
        }
    }

      /**
     * function to remove data user
     * @author Rizal <wage.rizal@smooets.com>
     * @param  id
     * @return void
     */

    public function destroy(Request $request)
    {
        if(access('user','delete')  == true){
            User::find ( $request->id )->delete();
            return response ()->json();
        }
        else
        {
            return back();
        }
    }
      /**
     * function to get data user for datatable 
     * @author Rizal <wage.rizal@smooets.com>
     * @param  
     * @return void
     */


    public function getData()
    {
         
        return Datatables::of(User::datatables())
        ->addColumn( 'action', function ( $user ) {
            $edit_url = route('user.edit', $user->id );
            $delete_url = route('user.destroy', $user->id);
            $data['empty']='';
            if(access('user','edit') == true){
                $data['edit_url']   = $edit_url;
            }
            if(access('user','delete')  == true){
               $data['delete_url'] = $delete_url;
            }
            return view('admin.forms.action', $data);
        })
        ->make(true);
    }
   

}
