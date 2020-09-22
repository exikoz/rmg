<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ads()
    {
        $articles = Article::where('user_id', auth()->id())
                    ->where('deleted', 0)
                    ->latest()->get();

        return view('article.ads', compact('articles'));
    }


    public function index()
    {
        $articles = Article::where('deleted', 0)->latest()->get();

        return view('article.index', compact('articles'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function store()
    {

        $this->validateArticle();

        $article = new Article(request(['title', 'price', 'description']));
        $article->user_id = auth()->id();
        $article->save();

        return redirect(route('article.index'));
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function edit(Article $article)
    {
        abort_if( $article->user_id !== auth()->id(), 403);
        return view('article.edit', compact('article'));
    }

    public function update(Article $article)
    {

        $article->update($this->validateArticle());

        return redirect(route('article.index'));

    }

    public function deleted(int $id)
    {
        $article = Article::find($id);
        $article->deleted = 1;
        $article->save();
        return redirect(route('article.index'));

    }

    public function trashed()
    {
        $articles = Article::where('user_id', auth()->id())
                    ->where('deleted', 1)
                    ->latest()->get();

        return view('article.trashed', compact('articles'));
    }

    protected function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'description' => 'required'
        ]);
    }
}
