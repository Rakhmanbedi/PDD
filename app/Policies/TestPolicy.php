<?php

namespace App\Policies;

use App\Models\Cart;
use App\Models\Test;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class TestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Test $test)
    {
        if ($cart = $user->carts()->where('category_id', $test->category_id)->first()) {
            return ($user->id == $cart->user_id) && ($test->category_id == $cart->category_id && $cart->is_active == true);
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role->name != 'user';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Test $test)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Test $test)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Test $test)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Test $test)
    {
        //
    }
}
