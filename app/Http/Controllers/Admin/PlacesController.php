<?php

namespace Imperium\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Imperium\Models\Place;
use Imperium\Http\Controllers\Controller;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $places = Place::all();
        $params = [
            'title' => trans('places.list'),
            'places' => $places,
        ];

        // If it's an API request
        if ($request->wantsJson()) {
            return response()->json(['success'=> true, 'message'=> $places]);
        }

        return view('admin.places.index')->with($params);
    }

    //
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $params = [
            'title' => trans('places.add')
        ];
        return view('admin.places.create')->with($params);
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
            'description' => 'required',
            'price' => 'required',
            'schedule' => 'required',
            'visitationTime' => 'required',
            'coordinates' => 'required',
            'images' => 'required'
        ]);
        $places = Place::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'schedule' => $request->input('schedule'),
            'visitationTime' => $request->input('visitationTime'),
            'coordinates' => $request->input('coordinates'),
            'images' => $request->input('images')
        ]);

        return redirect()->route('places.index')->with('success', trans('places.created', ['name' => $places->name]));
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
            $places = Place::findOrFail($id);

            $params = [
                'title' => trans('places.edit'),
                'places' => $places,
            ];

            return view('admin.places.edit')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return redirect()->route('places.index')->with('error', trans('places.notFound'));
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
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'schedule' => 'required',
                'visitationTime' => 'required',
                'coordinates' => 'required',
                'images' => 'required'
            ]);

            $places = Place::findOrFail($id);
            $places->name = $request->input('name');
            $places->description = $request->input('description');
            $places->price = $request->input('price');
            $places->schedule = $request->input('schedule');
            $places->visitationTime = $request->input('visitationTime');
            $places->coordinates = $request->input('coordinates');
            $places->images = $request->input('images');
            $places->save();

            return redirect()->route('places.index')->with('success', trans('places.updated', ['name' => $places->name]));
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return redirect()->route('places.index')->with('error', trans('places.notFound'));
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
            $places = Place::findOrFail($id);
            $places->delete();
            return redirect()->route('places.index')->with('success', trans('places.deleted', ['name' => $places->name]));
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return redirect()->route('places.index')->with('error', trans('places.notFound'));
            }
        }
    }
}
