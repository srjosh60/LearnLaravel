<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(2);
        return view('pages.articles', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('pages.article-detail', compact('article'));
    }
}