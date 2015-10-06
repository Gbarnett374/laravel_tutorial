<?php

namespace App\Http\Controllers;
use App\articles;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    function index()
    {
        $data['articles'] = Articles::latest('published_at')->published()->get();
        return view('articles.index', $data);
    }

    function show($id){

        $article = Articles::findOrFail($id);
        return view('articles.show')->with('article', $article);
    }

    function create()
    {
        return view('articles.create');
    }

    function store(ArticleRequest $request)
    {

        Articles::create($request->all());

        return redirect('articles');
    }

    function edit($id)
    {   
        $article = Articles::findOrFail($id);
        return view('articles.edit')->with('article', $article);
    }

    function update($id, ArticleRequest $request)
    {
        $article = Articles::findOrFail($id);

        $article->update($request->all());

        return redirect('articles');
    }
}
