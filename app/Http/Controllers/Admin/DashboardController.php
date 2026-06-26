<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\CompanyProfile;
use App\Models\Gallery;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $totalArticles = Article::count();
        $totalProducts = Product::count();
        $totalGallery = Gallery::count();
        $totalProfile = CompanyProfile::count();

        $latestArticles = Article::latest()->take(5)->get();
        $latestProducts = Product::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalArticles',
            'totalProducts',
            'totalGallery',
            'totalProfile',
            'latestArticles',
            'latestProducts'
        ));
    }
}