<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        $recipes = Recipe::paginate(6);
        $ingredients = Ingredient::all();
        return view('user.searchPanel', ['title' => 'Search Panel', 'recipes' => $recipes, 'ingredients' => $ingredients]);
    }

    public function search(Request $request)
    {
        // get ingredient
        if ($request->ingredient[0] && $request->ingredient[1] === True) {
            $data = implode(",", $request->ingredient);
            $search = Recipe::where('ing', 'LIKE', '%' . $request->inggredient[0] . '%')->where('ing', 'LIKE', '%' . $request->ingredient[1] . '%')->get();
        } elseif ($request->ingredient[1] && $request->ingredient[2] === True) {
            $data = implode(",", $request->ingredient);
            $search = Recipe::where('ing', 'LIKE', '%' . $request->inggredient[1] . '%')->where('ing', 'LIKE', '%' . $request->ingredient[2] . '%')->get();
        } elseif ($request->ingredient[2] && $request->ingredient[3] === True) {
            $data = implode(",", $request->ingredient);
            $search = Recipe::where('ing', 'LIKE', '%' . $request->inggredient[2] . '%')->where('ing', 'LIKE', '%' . $request->ingredient[3] . '%')->get();
        } else {
            $search = Recipe::where('ing', 'LIKE', '%' . $request->ingredient[0] . '%')->get();
        }

        return view('user.search', ['title' => 'Search', 'search' => $search]);
    }
}
