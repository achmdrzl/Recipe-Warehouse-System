<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search()
    {
        // get ingredient
        $word = request('search');
        $string = preg_replace('/\s+/', '', $word);
        $words = explode(',', $string);
        $data = Ingredient::whereIn('item', $words)->OrWhere('item', $word)->get();

        if ($data->isEmpty()) {
            $search = Recipe::all();
        } else {
            foreach ($data as $value) {
                $search = Recipe::with(['detailRecipe.ingredient'])->where('ing', 'LIKE', '%' . $value->id . '%')->get();
                // $search = Recipe::whereIn('ing', 'LIKE', '%' . $value->id . '%')->get();
                return view('user.search', ['title' => 'Search', 'search' => $search]);
            }
        }
        
        return view('user.search', ['title' => 'Search', 'search' => $search]);
    }
}
