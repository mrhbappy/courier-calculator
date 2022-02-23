<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Image;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::all();

        if ($request->ajax()) {
            $data = User::latest()->get();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('roles', function ($row) {
                    $roles = json_decode($row->role);
                    return $roles;
                })
                ->addColumn('action', function ($row) {
                    $btn = "N/A";
                    if(Auth::user()->can('user-edit')){
                        $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn linear-btn btn-sm editUser" data-toggle="modal" data-target="#add_user">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i>  </a>';

                    }
                    if(Auth::user()->can('user-delete')){
                        $btn .= '   <a href="javascript:void(0)" data-id="' . $row->id . '" data-original-title="Delete" class="btn linear-btn-delete btn-sm delete">Delete</a>';

                    }

                    return $btn;
                })
                ->editColumn('is_active',function($row){
                    if($row->is_active==1){
                        return "<span class='badge badge-success'>Active</span>";
                    }
                    else{
                        return "<span class='badge badge-warning'>Inactive</span>";
                    }
                })
                ->rawColumns(['action', 'roles','is_active'])
                ->make(true);
        }
        return view('back.user.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Auth::user()->can('user-create')) {
            $request->validate(
                [
                    'name' => 'required',
                    'email' => 'required|unique:users,email',
                    'role' => 'required',
                    'password' => 'required|min:6|',
                    'c_password' => 'required|min:6|same:password',
                ],
                [
                    'email.required' => '',
                    'email.unique' => 'Email address already exist',
                    'employee_id.unique' => 'Employee ID already exist',
                    'employee_id.required' => '',
                ],
            );
            $input['name'] = ucfirst($request->name);
            $input['email'] = $request->email;
            $input['role'] = json_encode($request->role);
            $input['password'] = bcrypt($request->password);
            $input['is_active'] = $request->is_active == "on" ? 1 : 0;
            $user = new User($input);
            $success = $user->save();
            $user->assignRole($request->role);
            $token =  $user->createToken('shipping-rule')->plainTextToken;
            $user->update(['token' => $token]);
            if($success){
                return response()->json(['success' => 'User saved successfully']);
            }
            return response()->json(['unsuccess' => 'Something went wrong']);

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
        if (Auth::user()->can('user-edit')) {
            $editData = User::find($id);
            return response()->json($editData);
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
        if (Auth::user()->can('user-edit')) {
            $request->validate(
                [
                    'name' => 'required',
                    'email' => 'required|unique:users,email,'.$id,
                    'role' => 'required',

                ],
                [
                    'email.required' => '',
                    'email.unique' => 'Email address already exist',
                ],
            );

            if($request->filled('password')){
                $request->validate(['
                    password' => 'min:6',
                    'c_password' => 'min:6|same:password',
                ],[ 'c_password.same' => 'Password Mismatch',]);
            }

            $user = User::find($id);
            $user->role = json_encode($request->role);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->is_active = $request->is_active == "on" ? 1 : 0;
            $user->save();
            $user->syncRoles($request->role);
            if ($user->save()) {
                return response()->json(['success' => 'User updated successfully']);
            }
            else{
                return response()->json(['unsuccess' => 'Something went wrong, Please try again !!!']);
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
        $user = User::find($id);
        $success = $user->delete();
        if ($success) {
            return response()->json(['success' => 'User Delete Successfully']);
        }
        return response()->json(['unsuccess' => 'Something went wrong please try again']);

    }


    public function myProfile()
    {
        $profile = Auth::user();
        return view('front.profile.index', compact('profile'));
    }


    public function PassWordChange(Request $request)
    {
        $rules = [
            'old_password' => 'required',
            'new_password' => 'required|min:6|',
            'c_password' => 'required|min:6|same:new_password',
        ];

        $messages = [
            'required' => '',
            'min' => 'Minimum 6 characters',
            'same' => 'Password mismatch with new password',
        ];

        $request->validate($rules, $messages);

        if (Auth::attempt(['id' => Auth::user()->id, 'password' => $request->old_password])) {
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return response(['success' => 'Password Updated Successfully']);
        } else {
            return response(['old_pass_err' => 'Password Mismatch']);
        }
    }
}
