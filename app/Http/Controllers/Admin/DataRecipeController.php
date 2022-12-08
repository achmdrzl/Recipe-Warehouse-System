<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ImgUploading;
use App\Models\Detail_recipe;
use App\Models\Ingredient;
use App\Models\Instruction;
use App\Models\Recipe;
use Illuminate\Http\Request;

class DataRecipeController extends Controller
{
    use ImgUploading;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view('admin.dataRecipe.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredients = Ingredient::all()->pluck('item', 'id');
        return view('admin.dataRecipe.create', compact('ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Data
        $this->validate($request, [
            'nameFood' => 'required',
            'kategori' => 'required',
            'cookTime' => 'required',
            'prepTime' => 'required',
            'desc' => 'required',
            'note' => 'required',
            'ingredient' => 'required',
            'instruction' => 'required',
        ]);

        // Check if data excist
        $data = Recipe::orderBy('id', 'DESC')->first();

        if ($data) {
            $string = $data->codeF;
        } else {
            $string = "P000";
        }

        $recipes = Recipe::create(
            [
                'codeF' =>  ++$string,
                'nameFood' => $request->nameFood,
                'kategori' => $request->kategori,
                'cookTime' => $request->cookTime,
                'prepTime' => $request->prepTime,
                'desc' => $request->desc,
                'note' => $request->note,
                'ing' => implode(',', $request->ingredient)
            ]
        );

        // Insert Into Detail Recipe
        foreach ($request->ingredient as $key => $value) {
            Detail_recipe::create(
                [
                    'ingredient_id' => $request->ingredient[$key],
                    'recipe_id' => $recipes->id,
                ]
            );
        }

        // Insert Into Instruction
        foreach ($request->instruction as $key => $value) {
            Instruction::create(
                [
                    'instruction' => $request->instruction[$key],
                    'recipe_id' => $recipes->id,
                ]
            );
        }

        // Insert Photo
        if ($request->input('photo', false)) {
            $recipes->addMedia(storage_path('tmp/uploads/') . $request->input('photo'))->toMediaCollection('photo');
        }

        return redirect()->route('recipes.index')->with([
                'message' => 'Penambahan Data Resep Makanan Berhasil!',
                'type' => 'success'
            ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $recipe = Recipe::where('id', $id)->first();
        // $orders = Order::with(['orderProduct.product'])->where('id', $id)->first();
        $recipe = Recipe::with(['detailRecipe.ingredient'])->where('id', $id)->first();
        return view('admin.dataRecipe.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::with(['detailRecipe.ingredient'])->where('id', $id)->first();
        $ingredients = Ingredient::all()->pluck('item', 'id');
        return view('admin.dataRecipe.edit', compact('recipe', 'ingredients'));

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
        // Validate Data
        $this->validate($request, [
            'nameFood' => 'required',
            'kategori' => 'required',
            'cookTime' => 'required',
            'prepTime' => 'required',
            'desc' => 'required',
            'note' => 'required',
            // 'ingredient' => 'required',
            // 'instruction' => 'required',
        ]);

        $recipes = Recipe::where('id', $id)->update(
            [
                'nameFood' => $request->nameFood,
                'kategori' => $request->kategori,
                'cookTime' => $request->cookTime,
                'prepTime' => $request->prepTime,
                'desc' => $request->desc,
                'note' => $request->note,
                'ing' => implode(',', $request->ingredient)
            ]
        );
        $recipe = Recipe::where('id', $id)->first();
        if ($request->input('photo', false)) {
            if (!$recipe->photo || $request->input('photo') !== $recipe->photo->file_name) {
                isset($recipe->photo) ? $recipe->photo->delete() : null;
                $recipe->addMedia(storage_path('tmp/uploads/') . $request->input('photo'))->toMediaCollection('photo');
            }
        } else if ($recipe->photo) {
            $recipe->photo->deleted();
        }

        // Insert Into Instruction
        $instructions = Instruction::where('recipe_id', $id)->delete();
        foreach ($request->instruction as $key => $value) {
            Instruction::create(
                [
                    'instruction' => $request->instruction[$key],
                    'recipe_id' => $id,
                ]
            );
        }

        // Insert Into Detail Recipe
        $detailRecipe = Detail_recipe::where('recipe_id', $id)->delete();
        foreach ($request->ingredient as $key => $value) {
            Detail_recipe::create(
                [
                    'ingredient_id' => $request->ingredient[$key],
                    'recipe_id' => $id,
                ]
            );
        }

        return redirect()->route('recipes.index')->with([
                'message' => 'Mengubah Data Resep Makanan Berhasil!',
                'type' => 'success'
            ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recipe::find($id)->delete();
        Instruction::where('id_recipe', $id)->delete();
        Detail_recipe::where('id_recipe', $id)->delete();

        return response()->json(['status' => 'Data Resep Makanan Berhasil di Hapus!']);
    }
}
