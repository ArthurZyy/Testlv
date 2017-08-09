<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class ArticleController extends Controller
{
    //显示文章列表
    public function index(){
        /*$articles=DB::table('articles')->paginate(5);
        return view('home',['articles'=>$articles]);*/
        $articles=DB::table('articles')->paginate(5);
        //return view('admin/article/index')->withArticles(Article::all());
        return view('admin/article/index',['articles'=>$articles]);
    }

    //显示文章新建页面
    public function create(){
        return view('admin/article/create');
    }

    //新建文章
    public function store(Request $request){    //Laravel的依赖注入自动初始化我们需要的Request类
        //数据验证
        $this->validate($request,[
            'title'=>'required|unique:articles|max:255',    // 必填、最大长度 255
            'body'=>'required'  //必填
        ]);
        // 通过 Article Model 插入一条数据进 articles 表
        $article = new Article; // 初始化 Article 对象
        $article->title = $request->get('title'); // 将 POST 提交过了的 title 字段的值赋给 article 的 title 属性
        $article->body = $request->get('body'); // 同上
        $article->user_id = $request->user()->id; // 获取当前 Auth 系统中注册的用户，并将其 id 赋给 article 的 user_id 属性

        // 将数据保存到数据库，通过判断保存结果，控制页面进行不同跳转
        if ($article->save()) {
            return redirect('admin/article'); // 保存成功，跳转到 文章管理 页
        } else {
            // 保存失败，跳回来路页面，保留用户的输入，并给出提示
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }

    public function edit($id){
        return View('admin/article/edit')->withArticle(Article::find($id));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'title'=>'required|max:255',    // 必填、最大长度 255
            'body'=>'required'  //必填
        ]);
        $data['title'] = $request->title;
        $data['body'] = $request->body;
        if(Article::where('id',$id)->update($data)){
            return Redirect::to('admin/article');
        }else {
            return redirect()->back()->withInput()->withErrors('修改失败！');
        }
    }

    public function destroy($id){
        Article::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }



}
