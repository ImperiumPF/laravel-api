<?php

namespace Imperium\Http\Controllers\Admin;

use Auth;
use Imperium\Models\Role;
use Imperium\Models\User;
use Illuminate\Http\Request;
use Imperium\Http\Controllers\Controller;

class UsersController extends Controller
{
    //public function __construct()
    //{
    //    $this->middleware('auth');
    //}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $params = [
            'title' => trans('users.list'),
            'users' => $users,
        ];
        return view('admin.users.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        $params = [
            'title' => trans('users.create'),
            'roles' => $roles,
        ];
        return view('admin.users.create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $role = Role::find($request->input('role_id'));

        $user->roles()->attach($role);
        
        return redirect()->route('users.index')->with('success', trans('users.created', ['name' => $user->name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        try
        {
            $user = User::findOrFail($id);
            $roles = Role::all();
            $params = [
                'title' => trans('users.edit'),
                'user' => $user,
                'roles' => $roles,
            ];
            return view('admin.users.edit')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return redirect()->route('users.index')->with('error', trans('users.notFound'));
            }
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
        try
        {
            $user = User::findOrFail($id);
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            ]);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();
            
            // detach and atach role?

            return redirect()->route('users.index')->with('success', trans('users.updated', ['name' => $user->name]));
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return redirect()->route('users.index')->with('error', trans('users.notFound'));
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
        try
        {
            if (Auth::user()->id == $id || $id == 1)
                return redirect()->route('users.index')->with('error', trans('users.cantDelete'));

            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('users.index')->with('success', trans('users.deleted', ['name' => $user->name]));
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return redirect()->route('users.index')->with('error', trans('users.notFound'));
            }
        }
    }
}
