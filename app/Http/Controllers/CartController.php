<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        return view('cart.index', ['cart' => Auth::user()->carts]);
    }

    public function store(Category $category){
        Auth::user()->cartCategories()->attach($category->id, ['is_active' => true]);

        if (Auth::user()->balance >= 6000){
            Auth::user()->decrement('balance', 6000);
        }

        return back();
    }


}
