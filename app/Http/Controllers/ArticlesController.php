<?php

namespace App\Http\Controllers;
use App\articles;
// use Illuminate\Http\Request;
use App\Http\Requests\CreateArticleRequest;
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

    function store(CreateArticleRequest $request)
    {

        Articles::create($request->all());

        return redirect('articles');
    }
}
