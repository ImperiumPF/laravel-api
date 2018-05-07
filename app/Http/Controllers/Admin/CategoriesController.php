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
            'title' => 'Categories List',
            'categories' => $categories,
        ];

        // If it's an API request
        if ($request->wantsJson()) {
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
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        $category = Category::create([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        if ($request->wantsJson()) {
            return response()->json("ok");
        }

        return redirect()->route('admin.categories.index')->with('success', "The user <strong>$user->name</strong> has successfully been created.");
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
                'title' => 'Edit Product Category',
                'category' => $category,
            ];

            return view('admin.categories.index')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
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

            return redirect()->route('admin.categories.index')->with('success', "The product category <strong>Category</strong> has successfully been updated.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
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
            return redirect()->route('admin.categories.index')->with('success', "The product category <strong>Category</strong> has successfully been archived.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return redirect()->route('product-categories.index')->with('error', "Ocorreu um erro ao eliminar a categoria");
            }
        }
    }

}