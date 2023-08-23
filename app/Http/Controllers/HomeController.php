<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    public function index(){
        $products = Product::whereIn('status', ['approved'])->latest()->simplePaginate(6);
        $all_products = Product::all();
        $users = User::all();
        $roles = Role::all();

        return view('home.index', compact('products','users', 'all_products', 'roles'));
    }
}
