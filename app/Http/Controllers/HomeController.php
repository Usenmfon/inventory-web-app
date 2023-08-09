<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::whereIn('status', ['approved'])->latest()->simplePaginate(6);
        // dd($products);
        return view('home.index', compact('products'));
    }
}
