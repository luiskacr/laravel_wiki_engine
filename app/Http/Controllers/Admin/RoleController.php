<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        //dd($roles);
        return view('admin.Roles.index')->with('roles',$roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:roles'
        ]);

        DB::beginTransaction();
        try{
            $user = Role::create([
                'name' => $request->request->get('name'),
                'guard_name' => 'web'
            ]);

            DB::commit();
        }catch (\Exception $e){
            DB::rollback();

            return redirect()->route('role.create')->with('error',$e->getMessage());
        }

        return redirect()->route('role.index')->with('success','Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('admin.Roles.show')->with('role',$role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view('admin.Roles.edit')->with('role',$role);
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

        $request->validate([
            'name'=>'required|unique:roles'
        ]);

        DB::beginTransaction();
        try{
            Role::whereId($id)->update(['name' => $request->request->get('name')]);

            DB::commit();
        }catch (\Exception $e){

            DB::rollback();

            return redirect()->route('role.edit',$id)->with('error',$e->getMessage());
        }
        return redirect()->route('role.index')->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $role = Role::findById($id);
            $role->delete();

            DB::commit();
        }catch (\Exception $e){
            DB::rollback();

            return redirect()->route('role.show',$id)->with('error',$e->getMessage());
        }

        return redirect()->route('role.index')->with('success','Role deleted successfully');
    }
}
