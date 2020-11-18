<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
    	return view('welcome');
    }

    public function recipes()
    {
        return response()->json(Recipe::all(),200);
    }

    public function create(Request $request)
    {
        Recipe::create([
            'title' => $request['title'],
            'instructions' => $request['instructions'],
            'ingredients' => $request['ingredients'],
            'time' => $request['time'],
            'servings' => $request['servings'],
            'nutrition' => $request['nutrition'],
            'type' => $request['type'],
        ]);
    	return response()->json(Recipe::all(),200);
    }

    public function delete(Request $request)
    {
    	Recipe::where('id' ,$request->delete_id)->delete();
    	return response()->json(Recipe::all(),200);
    }

     public function edit(Request $request)
    {
        Recipe::Where('id',$request->id) ->update([
            'title' => $request->title,
            'instructions' => $request->instructions,
            'ingredients' => $request->ingredients,
            'time' => $request->time,
            'servings' => $request->servings,
            'nutrition' => $request->nutrition,
            'type' => $request->type,
		  ]);
    	return response()->json(Recipe::all(),200);
    }
}
