<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function profile()
    {
        return view('adminpanel.profile');
    }

    public function profileedit(){
        return view('adminpanel.profileedit');
    }
//
//    public function create(Request $request)
//    {
//       Profile::create([
//           'img' => $request->img,
//           'name' => $request->name,
//           'mobile' => $request->mobile,
//           'email'=> $request->email,
//           'social' => $request->social,
//           'information' => $request->information,
//       ]);
//    }


    public function profilestore(Request $request)
    {
//        $this->authorize('profileedit', Profile::class);
        $validated = $request->validate([
            'email' => 'required',
            'img' => 'required',
            'name' => 'required',
            'mobile' => 'required',
            'social' => 'required',
            'information' => 'required'
        ]);
        Profile::create($validated);
        return redirect(route('profile'));

    }


    public function show(Profile $profile)
    {
        //
    }

    public function edit(Profile $profile)
    {
        //
    }


    public function update(Request $request, Profile $profile)
    {
        //
    }


    public function destroy(Profile $profile)
    {
        //
    }
}
