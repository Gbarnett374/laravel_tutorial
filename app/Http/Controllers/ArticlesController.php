<?php

namespace App\Http\Controllers;
use App\articles;
// use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    function index()
    {
        $data['articles'] = Articles::all();
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

    function store()
    {
        $input = Request::all();

        //set published at since model is expecting it in the fillable array for mass assignment.
        //use the Carbon class for now. 
        $input['published_at'] = Carbon::now();
        $article = Articles::create($input);

        return redirect('articles');
    }
}
