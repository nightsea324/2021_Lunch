<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Recipe;
use DB;

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
        $username = session('username');
        return view('createrecipe', ['username' => $username]);
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
            'memberName' => 'required|max:255',
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
        DB::connection('mysql');
        $recipecases = Recipe::findOrFail($id);
        $otherrecipecases = Recipe::all();
        $boardcases = DB::select("SELECT * FROM boards WHERE recipeId=?", [$id]);
        $username = session('username');
        return view('lookrecipe', compact('recipecases','otherrecipecases','boardcases'), ['username' => $username,'recipeId' => $id]);
    }

    public function list()
    {
        //
        DB::connection('mysql');
        $username = session('username');
        $recipecases = DB::select("SELECT * FROM recipes WHERE memberName=?", [$username]);
        if(!isset($recipecases[0]->memberName)){

            return view('recipelist', ['err'=>"使用者不存在",'username' => $username]);

        }else{
            return view('recipelist', compact('recipecases'),['username' => $username]);
        }
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
        $username = session('username');
        return view('editrecipe', compact('recipecases'), ['username' => $username]);
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
        $recipecases = Recipe::findOrFail($id);
        $recipecases->delete();
        $username = session('username');
        return redirect('/recipe')->with('success', 'recipe Case Data is successfully deleted');
    }

    public function search(Request $request)
    {
        //
        DB::connection('mysql');
        $username = session('username');
        $searchName = '%'.$request->searchName.'%';
        $recipecases = DB::select("SELECT * FROM recipes WHERE recipeName LIKE ?", [$searchName]);
        return view('recipelist', compact('recipecases'),['username' => $username]);
    }
}
