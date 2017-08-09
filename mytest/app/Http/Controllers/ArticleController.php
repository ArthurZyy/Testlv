<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    //show文章及其评论
    public function show($id){
        return View('article/show')->withArticle(Article::with('hasManyComments')->find($id));
    }
}
