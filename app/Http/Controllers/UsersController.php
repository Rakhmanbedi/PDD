<?php

namespace App\Http\Controllers;

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
}
