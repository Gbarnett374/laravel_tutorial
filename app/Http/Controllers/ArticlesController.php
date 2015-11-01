<?php

namespace App\Http\Controllers;
use App\articles;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use Auth;
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

        // Articles::create($request->all());
        $article = new Articles($request->all());
        //This works because we defined the relationship between an article and the user in user.php
        //Laravel automatically takes care of user id if you call method this way.
        Auth::user()->articles()->save($article);

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
