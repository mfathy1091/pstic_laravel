<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Role::findById(1);


        //$permission = Permission::create(['name'=>'role-list']);
        //$permission = Permission::findById(1);

        //auth()->user()->givePermissionTo('role-list');
        //auth()->user()->givePermissionTo('role-delete');

        //auth()->user()->revokePermissionTo('role-list');
        //auth()->user()->revokePermissionTo('role-list');


        //auth()->user()->assignRole($role);

        //$permission = Permission::findById(1);
        //$role->givePermissionTo('role-list');
        $role = Role::findById(1);
        //return $role->hasPermissionTo('role-list');
        //return $roles = auth()->user()->getRoleNames();
        //return User::doesntHave('roles')->get();

        //return auth()->user();


        return view('dashboard');
    }
}
