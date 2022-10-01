<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class MyProfileController extends Controller
{
    /**
     *
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $user = User::find($id);

        $roles = Role::all();

        return view('admin.Profile.show')->with('user',$user)->with('roles',$roles);
    }

    /**
     * Update Profile Information
     *
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id)
    {
        $credentials = $request->validate([
            'email' => 'required|unique:users,email,'.$id,
            'name' => ['required','string'],
        ]);
        DB::beginTransaction();
        try
        {
            User::whereId($id)->update($credentials);

            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollback();

            return redirect()->route('profile',$id)->with('error',$e->getMessage());
        }
        return redirect()->route('profile',$id)->with('success','Profile updated successfully');
    }


    /**
     * Update Profile Password
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(Request $request,$id)
    {
        $credentials = $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        DB::beginTransaction();
        try
        {
            $user = Auth::user();

            if (!Hash::check($request->current_password, $user->password))
            {
                return back()->with('error', 'Current password does not match!');
            }

            $user->password = $request->new_password;

            $user->save();

            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollback();

            return redirect()->route('profile',$id)->with('error',$e->getMessage());
        }
        return redirect()->route('profile',$id)->with('success','Profile updated successfully');
    }


    public function avatar(Request $request,$id)
    {
        try
        {
            if($request->hasFile('file')){

                $file = $request->file('file');
                $filename = $file->getClientOriginalName();
                $folder = uniqid() . '-' . now()->timestamp;
                $file->storeAs('avatars/'. $folder ,$filename);

                return $folder;
            }
            return '';
        }
        catch (\Exception $e)
        {
            return \response()->json([
                'error' => $e
            ]);
        }
    }

}
