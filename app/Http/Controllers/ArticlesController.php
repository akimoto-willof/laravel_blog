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
        return Inertia::render('Add');
    }

    public function create(Request $request)
    {
        $articles = Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth::id(),
            'slug' => $request->title,
        ]);

        return Inertia::render('Add');
    }

    public function edit(Article $article)
    {
        return Inertia::render('edit', ['article' => $article]);
    }

    public function update(Request $request, Article $article)
    {
        $article->fill($request->all())->save();
        return redirect('/articles');
    }
}
