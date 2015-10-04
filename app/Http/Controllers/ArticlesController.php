<?php

namespace App\Http\Controllers;
use App\articles;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
}
