<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    //
    //显示评论列表
    public function index(){
        return view('admin/comment/index')->withComments(comment::all());
    }

    public function edit($id){
        return view('admin/comment/edit')->withComment(Comment::find($id));
    }

    public function update(Request $request,$id){
        $this->validate($request, [
            'content' => 'max:255',
        ]);
        $date['content'] = $request->my_content;
        if(Comment::where('id',$id)->update($date)){
            return Redirect::to('admin/comment');
        }else{
            return Redirect::back()->withInput()->withErrors('更新失败！');
        }
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return Redirect::to('admin/comment');
    }
}
