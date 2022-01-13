<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Member;
use DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('login');
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
        //
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
        //
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
    }

    public function login(Request $request)
    {
        DB::connection('mysql');
        // $userData = DB::select("SELECT * FROM members WHERE memberName=?", [$request->memberName]);
        $userData = DB::select("SELECT * FROM members WHERE memberName=?", [$request->memberName]);

        if(!isset($userData[0]->memberName)){

            return view('login', ['err'=>"使用者不存在"]);

        }elseif(password_verify($request->memberPassword, $userData[0]->memberPassword)){

            session(['username' => $userData[0]->memberName]);
            return redirect('/recipe');

        }else{

            return view('login', ['err'=>"密碼錯誤"]);

        }
    }

    public function logout()
    {
        session()->forget('username');
        return redirect('/');
    }
}
