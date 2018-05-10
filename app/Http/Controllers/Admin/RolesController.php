<?php

namespace Imperium\Http\Controllers\Admin;

use Imperium\Models\Role;
use Illuminate\Http\Request;
use Imperium\Http\Controllers\Controller;


class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $roles = Role::all();
        $params = [
            'title' => trans('roles.Rlist'),
            'roles' => $roles,
        ];
        return view('admin.roles.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $params = [
            'title' => trans('roles.create'),
        ];
        return view('admin.roles.create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'description' => 'required',
        ]);
        //create the new role
        $role = new Role();
        $role->name = $request->input('name');
        $role->description = $request->input('description');
        $role->save();

        return redirect()->route('roles.index')->with('success', trans('roles.created', ['name' => $role->name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        try
        {
            $role = Role::findOrFail($id);

            $params = [
                'title' => trans('roles.edit'),
                'category' => $role,
            ];

            return view('admin.roles.edit')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return redirect()->route('roles.index')->with('error', trans('roles.notFound'));
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $role = Role::findOrFail($id);
            $this->validate($request, [
                'name' => 'required',
                'description' => 'required',
            ]);
            $role->name = $request->input('name');
            $role->description = $request->input('description');
            $role->save();
            
            // detach and atach role?

            return redirect()->route('roles.index')->with('success', trans('roles.updated', ['name' => $role->name]));
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return redirect()->route('users.index')->with('error', trans('roles.notFound'));
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        try
        {
            $role = Role::findOrFail($id);
            $role->delete();
            return redirect()->route('roles.index')->with('success', trans('roles.deleted', ['name' => $role->name]));
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return redirect()->route('users.index')->with('error', trans('roles.notFound'));
            }
        }
    }
}
