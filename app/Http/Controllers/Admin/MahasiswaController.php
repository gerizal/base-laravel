<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Permissions;
use App\RoleUser;
use App\Mahasiswa;
use App\Role_has_permissions;
use App\Menu;
use App\Icon;
use App\Submenu;
use Auth;
use DB;
class MahasiswaController extends Controller
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
        if(access('mahasiswa','view')  == true){
            return view('admin.mahasiswa.index');
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
        if(access('module','view')  == true){
           return view('admin.mahasiswa.create');
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
        if(access('mahasiswa','create')  == true){
            $mahasiswa = new Mahasiswa;
            $mahasiswa->nama = $request->nama;
            $mahasiswa->save();
            return redirect()->route( 'mahasiswa.index' )->with('message','mahasiswa created successfully');
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
        if(access('mahasiswa','edit')  == true){
            $mahasiswa = mahasiswa::find($id);
            return view('admin.module.edit', compact('mahasiswa'));
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
        //
        
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
        if(access('mahasiswa','delete')  == true){
            Mahasiswa::find ($id )->delete();
            $data['status'] = true;
            echo json_encode($data);
        }
        else
        {
            $data['status'] = 'You Have No Access';
            echo json_encode($data);
        }
    }
    public function getData()
    {
        return Datatables::of(Mahasiswa::datatables())
        ->addColumn( 'action', function ( $mahasiswa ) {
            $edit_modal = $mahasiswa->id;
            $delete_url = route('mahasiswa.destroy', $mahasiswa->id);
            $data['empty']='';
            if(access('mahasiswa','edit') == true){
                $data['edit_modal']   = $edit_modal;
            }
            if(access('mahasiswa','delete')  == true){
               $data['delete_url'] = $delete_url;
            }
            return view('admin.forms.action', $data);
        })
        ->make(true);
    }
}
