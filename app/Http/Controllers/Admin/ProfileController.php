<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\RoleUser;
use App\Profile;
use Auth;
use DB;
class ProfileController extends Controller
{
    //
     public function __construct(){
        $this->middleware('auth');
    }
      /**
     * function to go to page profile user
     * @author Rizal <wage.rizal@smooets.com>
     * 
     * @param 
     * @return void
     */
     public function index()
    {
        
         	$id_user = Auth::id();
          $profile = Profile::where('id',$id_user)->first();
            return view('admin.profile.edit', compact('profile'));
     
 
       
        
    }
     /**
     * function to update profile user
     * @author Rizal <wage.rizal@smooets.com>
     * 
     * @param 
     * @return void
     */
    public function update(Request $request, $id )
    {
  
      	$profile = Profile::find($id);
        $this->validate($request, [
        	 'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required',
            ]);
     		$profile->name = $request->name;
        $profile->email = $request->email;
        $profile->password = bcrypt($request['password']);
        $profile->save();
        if ($request->hasFile('photo')) {
          $image = $request->file('photo');
          $name = time().'.'.$image->getClientOriginalExtension();
          $destinationPath = public_path('/uploads/profiles');
          $image->move($destinationPath, $name);
          $profile->image = $name;
          $profile->save();
	  		 return redirect()->route('profile.index')
	                                ->with('message','profile updated successfully');
	       }
	       else
       	  {
            return back();
          }
        
       
    	
       
    }

}
