<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.Users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.Users.create')->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $user = User::create([
                'name'=> $request->request->get('name'),
                'email'=> $request->request->get('email'),
                'active'=> true,
                'password'=> bcrypt($request->request->get('password'))
            ]);

            $role = $request->request->get('role');

            if($role != null)
            {
                $user->assignRole($role);
            }

            if($request->request->getBoolean('reset_password'))
            {
                Password::sendResetLink($request->only('email'));
            }
            else
            {

            }

            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollback();

            return redirect()->route('users.create')->with('error',$e->getMessage());
        }

        return redirect()->route('users.index')->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        $roles = Role::all();

        return view('admin.Users.show')->with('user',$user)->with('roles',$roles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $roles = Role::all();

        return view('admin.Users.edit')->with('user',$user)->with('roles',$roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try{
            $user = User::find($id);

            $user->syncRoles([]);

            $user->assignRole($request->request->get('role'));

            $isActive = $request->request->get('active') == 'on' ? true : false;

            if($request->request->get('password') == null)
            {
                $user->update([
                    'name' => $request->request->get('name'),
                    'email' => $request->request->get('email'),
                    'active' => $isActive
                ]);
            }
            else
            {
                $user->update([
                    'name' => $request->request->get('name'),
                    'email' => $request->request->get('email'),
                    'active' => $isActive,
                    'password' => $request->request->get('password')
                ]);
            }

            DB::commit();
        }catch (\Exception $e){
            DB::rollback();

            return redirect()->route('users.show',$id)->with('error',$e->getMessage());
        }

        return redirect()->route('users.index')->with('success','User updated successfully');
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
            $user = User::find($id);

            $user->syncRoles([]);

            $user->delete();

            DB::commit();
        }catch (\Exception $e){
            DB::rollback();

            return redirect()->route('users.show',$id)->with('error',$e->getMessage());
        }

        return redirect()->route('users.index')->with('success','User deleted successfully');
    }
}
