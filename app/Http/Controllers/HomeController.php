<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['welcome', 'catalog']]);
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function catalog()
    {
        return view('catalog');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = Product::count();
        $users = User::count();

        return view('dashboard', compact('products', 'users'));
    }

    public function products()
    {
        return view('pages.products.list');
    }

    public function addProduct()
    {
        return view('pages.products.add');
    }
}
