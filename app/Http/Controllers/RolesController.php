<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //check is admin
        if (!Auth::user()->Admin()){
            return redirect(route('welcome'))->withToastError('No No No!!!');
        }

        $roles = Role::get();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        //validate save category
        $validator = Validator::make($request->all(), [
            'userLevel' => 'required',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $role = new Role();

        $role->userLevel = htmlspecialchars($request->userLevel);

        $role->save();

        return redirect(route('role.index'))->withToastSuccess('Rola Created Successfully!');
    }

    public function show(Role $role)
    {
        //check is admin
        if (!Auth::user()->Admin()){
            return redirect(route('welcome'))->withToastError('No No No!!!');
        }

        return view('roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        return back();
    }

    public function update(Request $request, Role $role)
    {
        //validate update category
        $validator = Validator::make($request->all(), [
            'userLevel' => 'required',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $role->userLevel = htmlspecialchars($request->userLevel);

        $role->update();

        return redirect(route('role.index'))->withToastSuccess('Rola Updated Successfully!');
    }

    public function destroy(Role $role)
    {
        //delete role
        $role->delete();

        return redirect(route('role.index'))->withToastSuccess('Rola Deleted Successfully!');
    }
}
