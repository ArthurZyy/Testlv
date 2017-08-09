@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">修改一条评论</div>
                    <div class="panel-body">

                        @if (count($errors) >0)
                            <div class="alert alert-danger">
                                <strong>修改失败</strong>，输入不符合要求<br><br>
                                 {!! implode('<br>',$errors->all()) !!}
                            </div>
                        @endif
                        <form action="{{ url('admin/comment/update/'.$comment->id) }}" method="POST">
                            {!! csrf_field() !!}
                            {{ $comment->title }}
                            <br>
                            <textarea name="my_content" rows="10" class="form-control" required="required" placeholder="请输入内容" >{{ $comment->content }}</textarea>
                            <br>
                            <button class="btn btn-lg btn-info">修改评论</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection