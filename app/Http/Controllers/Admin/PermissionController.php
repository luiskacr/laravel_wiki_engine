<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();

        return view('admin.Permission.index')->with('permissions',$permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Permission.create');
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
            'name'=>'required|unique:permissions'
        ]);

        DB::beginTransaction();
        try{
            $permission = Permission::create([
                'name' => $request->request->get('name'),
                'guard_name' => 'web'
            ]);

            DB::commit();
        }catch (\Exception $e){
            DB::rollback();

            return redirect()->route('category.create')->with('error',$e->getMessage());
        }

        return redirect()->route('category.index')->with('success','Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::findOrFail($id);

        return view('admin.Permission.show')->with('permission',$permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('admin.Permission.edit')->with('permission',$permission);
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
            'name'=>'required|unique:permissions'
        ]);

        DB::beginTransaction();
        try{
            Permission::whereId($id)->update(['name' => $request->request->get('name')]);

            DB::commit();
        }catch (\Exception $e){

            DB::rollback();

            return redirect()->route('permission.edit',$id)->with('error',$e->getMessage());
        }
        return redirect()->route('permission.index')->with('success','Permission updated successfully');
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
            $permission = Permission::findById($id);
            $permission->delete();

            DB::commit();
        }catch (\Exception $e){
            DB::rollback();

            return redirect()->route('permission.show',$id)->with('error',$e->getMessage());
        }

        return redirect()->route('permission.index')->with('success','Role deleted successfully');
    }
}
