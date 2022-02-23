<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'DESC')->get();
        return view('back.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Auth::user()->can('role-create')) {
            $permissions = Permission::all();
            $permission_gropus = Permission::get()->groupBy('group_name');
            return view('back.role.create', compact('permissions', 'permission_gropus'));
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

        if (Auth::user()->can('role-create')) {
            $this->validate($request, [
                'role_name' => 'required|unique:roles,name',
                'permissions' => 'required',
            ]);

            $role = Role::create(['name' => $request->role_name]);
            $role->syncPermissions($request->permissions);

            return redirect()->route('role.index')->with('success', 'Role created successfully');
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
        if (Auth::user()->can('role-edit')) {
            $role = Role::find($id);
            $permissions = Permission::all();
            $permission_gropus = Permission::get()->groupBy('group_name');
            return view('back.role.edit', compact('role', 'permissions', 'permission_gropus'));
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
        if (Auth::user()->can('role-edit')) {

            $request->validate([
                'role_name' => 'required|max:100|unique:roles,name,' . $id
            ], [
                'role_name.requried' => 'Please give a role name'
            ]);

            if (!empty($request->permissions)) {
                $role = Role::find($id);
                $role->name = $request->role_name;
                $role->save();
                $role->syncPermissions($request->permissions);
                session()->flash('success', 'Updated Successfully');
                return back();
            } else {
                session()->flash('error', 'Something Went Wrong');
                return back();
            }
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
        if (Auth::user()->can('role-delete')) {
            $role = Role::find($id);
            if (!is_null($role)) {
                $role->delete();
                return response()->json(array('success' => "Data deleted successfully"));
            }
        }
    }
}
