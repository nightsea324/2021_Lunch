<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Recipe;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $recipecases = Recipe::all();
        $username = session('username');
        return view('index', compact('recipecases'), ['username' => $username]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('createrecipe');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'recipeName' => 'required|max:255',
            'ingredients' => 'required|max:255',
            'step' => 'required|max:255',
        ]);
        $show = Recipe::create($validatedData);
   
        return redirect('/recipe')->with('success', 'Recipe Case is successfully saved');
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
        $recipecases = Recipe::findOrFail($id);
        return view('lookrecipe', compact('recipecases'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $recipecases = Recipe::findOrFail($id);
        return view('editrecipe', compact('recipecases'));
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
        //
        $validatedData = $request->validate([
            'recipeName' => 'required|max:255',
            'ingredients' => 'required|max:255',
            'step' => 'required|max:255',
        ]);
        Recipe::where('recpieId',$id)->update($validatedData);
        return redirect('/recipe')->with('success', 'recipe Case Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $coronacase = Recipe::findOrFail($id);
        $coronacase->delete();
        return redirect('/recipe')->with('success', 'recipe Case Data is successfully deleted');
    }
}
