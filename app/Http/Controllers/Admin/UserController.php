<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\User as UserAlias;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users(Request $request){
        $users = null;
        if ($request->search){
            $users = User::where('name', 'LIKE', '%'.$request->search.'%')->
                orWhere('email', 'LIKE', '%'.$request->search.'%')->
                with('role')->get();
        }
        else{
            $users = User::with('role')->get();
        }

        return view('adminpanel.user', ['users' => $users]);
    }

    public function edit(User $user){
        return view('adminpanel.edit',['role' => Role::all(),'user' =>$user]);
    }

    public function update(Request $request, User $user){
        $this->authorize('viewAny',  $user);
        $user->update([
            'role_id'=>$request->role_id,

        ]);
        return redirect(route(''))->with('message', (__('message.Changed successfully')));
    }

    public function ban(User $user){
        $user->update([
            'is_active' => false,
        ]);
        return back();
    }

    public function unban(User $user){
        $user->update([
            'is_active' => true,
        ]);
        return back();
    }

}
