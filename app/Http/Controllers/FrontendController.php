<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request){
        $products = Products::with(['gallery'])->latest()->get();
        return view('pages.frontend.index' , compact('products'));
    }

    public function details(Request $request , $slug){
        $products = Products::with(['gallery'])->where('slug' , $slug)->firstOrFail();
        return view('pages.frontend.details', compact('products'));
    }

    
    public function cart(Request $request){
        return view('pages.frontend.cart');
    }

    public function success(Request $request){
        return view('pages.frontend.success');
    }
}

