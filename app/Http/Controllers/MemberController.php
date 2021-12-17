<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Support\Facades\Auth;
use Str;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;

class MemberController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Member::all();
        $members = [
            'mail' =>  Auth::user()->email,
            'password' =>  Auth::user()->password,
        ];
        if (Auth::user()->isAdmin) //是管理者，回傳所有會員資料
            return $this->sendResponse($admins->toArray(), 'Members retrieved successfully.');
        else //不是管理者，回傳該會員自己的資料
            return $members;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
      public function adminStore(Request $request) { //管理者註冊的function
        try {
            $request->validate([ //這邊會驗證註冊的資料是否符合格式
                'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
                'password' => ['required', 'string', 'min:6', 'max:12'], 
            ]);

            $apiToken = Str::random(10);
            $create = Member::create([
                'email' => $request['email'],
                'password' => $request['password'],
                'isAdmin' => '1',
                'api_token' => $apiToken,
            ]);

            if ($create) {
                return "Register as an admin. Your Token is $apiToken.";
            }

        } catch (Exception $e) {
            sendError($e, 'Registered failed.', 500);

        }

    }
    public function store(Request $request)
    {
        $request->validate([ 
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
            'password' => ['required', 'string', 'min:6', 'max:12'],
        ]);

        $apiToken = Str::random(10);
        $create = Member::create([
            'email' => $request['email'],
            'password' => $request['password'],
            'api_token' => $apiToken,
        ]);

        if ($create)
            return "Register as a normal user. Your api token is $apiToken";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Member $members
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $input = $request->all();
        $validator = Validator::make($input, [ //修改會員資料一樣要驗證是否符合格式
            'email' => ['string', 'email', 'max:255', 'unique:members'],
            'password' => ['string', 'min:6', 'max:12'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $member = Auth::user();
        if ($member->update($request->all()))
            return $this->sendResponse($member->toArray(), 'Member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Member $members
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $members)
    {
        if ( Auth::user()->isAdmin){ //驗證是否為管理者
            if ($members->delete())
                return $this->sendResponse($members->toArray(), 'Member deleted successfully.');
        }
        else
            return "You have no authority to delete";

    }
}