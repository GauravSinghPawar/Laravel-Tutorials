<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//gaurav
use App\Article;


class ArticlesController extends Controller
{
    public function create(){
      return view('articles.create');
    }

    public function submit(Request $request){
    //  return $request->all();


    $article = new Article;
    $article->name = $request->name;
    $article->content_title = $request->content_title;
    $article->content_body = $request->content_body;
    $article->categories = $request->categories;

    $article->save();


    }

}
