<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('status', 'available')->latest()->take(3)->get();
        $latestArticles = Article::latest()->take(3)->get();
        return view('pages.home', compact('featuredProducts', 'latestArticles'));
    }
}
