<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ArticlesController extends Controller
{
    public function index()
    {
        $users = User::all();
        $articles = Article::all();
        return Inertia::render('Index', [
            'users' => $users,
            'articles' => $articles,
        ]);
    }


    public function add()
    {
        $articles = Article::all();
        return Inertia::render('Add', [
            'articles' => $articles,
        ]);
    }


    public function create(Request $request)
    {
        $articles = Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user_id,
            'slug' => $request->title,
        ]);
        return  Inertia::render('complete');
    }


    public function edit()
    {
        $articles = Article::all();
        return Inertia::render('Edit', ['article' => $articles]);
    }


    public function update(Request $request, Article $article)
    {
        $article->fill($request->all())->save();
        return redirect('/articles');
    }
}
