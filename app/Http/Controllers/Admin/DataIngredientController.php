<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Detail_recipe;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;

class DataIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::all();

        return view('admin.dataIngredient.index', compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'item' => 'required|unique:ingredients',
            'codeI' => 'unique:ingredients',
        ]);

        $data = Ingredient::orderBy('id', 'DESC')->first();

        if ($data) {
            $string = $data->codeI;
        } else {
            $string = "B000";
        }

        $input = $request->all();
        $total = count($request->item);

        foreach ($request->item as $key => $value) {
            Ingredient::create(
                [
                    'codeI' =>  ++$string,
                    'item' => $request->item[$key],
                ]
            );
        }

        return redirect()->route('ingredient.index')->with([
            'message' => 'Penambahan Data Bahan Makanan Berhasil!',
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
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ingredient::find($id);

        return view('admin.dataIngredient.edit', compact('data'));
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
        $this->validate($request, [
            'item' => 'required|unique:ingredients',
        ]);

        $data = Ingredient::find($id);
        $data->update([
            'item' => $request->input('item'),
        ]);

        return redirect()->route('ingredient.index')->with([
            'message' => 'Ubah Data Bahan Makanan Berhasil!',
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
        Ingredient::find($id)->delete();

        return response()->json(['status' => 'Data Bahan Makanan Berhasil di Hapus!']);
    }
}
