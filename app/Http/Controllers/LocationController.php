<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function Checklocation(Request $request)
    {
        $locations = Location::all();
        return response()->json($locations);
    }
}
