<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function user()
    {
        return view('adminpanel.user');
    }

    public function instruction(){
        return view('adminpanel.instruction');
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Users $users)
    {
        //
    }


    public function edit(Users $users)
    {
        //
    }


    public function update(Request $request, Users $users)
    {
        //
    }


    public function destroy(Users $users)
    {
        //
    }
    public function balance(){
        return view('adminpanel.mybalance');
    }

    public function addBalance(Request $request,User $user){
        $ss = 0;
        if($user->balance != null){
            $ss = $user->balance + $request->balance;
        }else{
            $ss = $request->balance;
        }

        $user->update([
            'balance' => $ss,
        ]);

        return redirect(route('balance'))->with('message', (__('message.Changed successfully')));
    }
}
