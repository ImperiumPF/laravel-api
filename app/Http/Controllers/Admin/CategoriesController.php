<?php

namespace Imperium\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Imperium\Models\Category;
use Imperium\Http\Controllers\Controller;

class CategoriesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $params = [
            'title' => trans('categories.list'),
            'categories' => $categories,
        ];

        // If it's an API request
        if ($request->acceptsJson()) {
            return response()->json(['success'=> true, 'message'=> $categories]);
        }

        return view('admin.categories.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $params = [
            'title' => trans('categories.add')
        ];
        return view('admin.categories.create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories',
            'description' => 'required'
        ]);
        $category = Category::create([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);
          
        //TODO: fix this
        if ($request->acceptsJson()) {
            return response()->json("ok");
        }

        return redirect()->route('categories.index')->with('success', trans('categories.created', ['name' => $category->name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
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
            $category = Category::findOrFail($id);

            $params = [
                'title' => trans('categories.edit'),
                'category' => $category,
            ];

            return view('admin.categories.edit')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return redirect()->route('categories.index')->with('error', trans('categories.notFound'));
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $this->validate($request, [
                'name' => 'required|unique:categories,name,'.$id,
                'description' => 'required',
            ]);

            $category = Category::findOrFail($id);
            $category->name = $request->input('name');
            $category->description = $request->input('description');
            $category->save();

            return redirect()->route('categories.index')->with('success', trans('categories.updated', ['name' => $category->name]));
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return redirect()->route('categories.index')->with('error', trans('categories.notFound'));
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
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->route('categories.index')->with('success', trans('categories.deleted', ['name' => $category->name]));
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return redirect()->route('categories.index')->with('error', trans('categories.notFound'));
            }
        }
    }

}