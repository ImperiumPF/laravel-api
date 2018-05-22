<?php

namespace Imperium\Http\Controllers\Admin;

use DB;
use Auth;
use Exception;
use Imperium\Models\Visit;
use Imperium\Models\Place;
use Imperium\Models\User;
use Illuminate\Http\Request;
use Imperium\Http\Controllers\Controller;

class VisitsController extends Controller
{
    /**
     * API only
     */
    public function visit(Request $request, $id)
    {
        try
        {
            $local = Place::findOrFail($id);
            $user = Auth::user();
            DB::table('visits')->insert(['userID' => $user->id, 'placeID' => $local]);

            return response()->json(['success'=> true, 'message'=> 'Place visited successfully']);
        }
        catch (Exception $ex) 
        {
            return response()->json(['success'=> false, 'message'=> "Place could not be found."], 404);
        }
    }
}