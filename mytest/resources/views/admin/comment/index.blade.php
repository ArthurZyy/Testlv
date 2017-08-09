@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">评论管理</div>

                    <div class="panel-body">

                        {{--评论列表--}}
                        <table class="table table-striped">
                            <tr class="row">
                                <th class="col-lg-8">评论</th>
                                <th class="col-lg-1s">评论人</th>
                                <th class="col-lg-4">文章</th>
                                <th class="col-lg-1">编辑</th>
                                <th class="col-lg-1">删除</th>
                            </tr>
                            @foreach($comments as $comment)
                                <tr class="row">
                                    <td class="col-lg-4" class="content">
                                        {{ str_limit($comment->content,45) }}
                                    </td>
                                    <td class="col-lg-2">
                                        @if ($comment->website)
                                            <a href="{{ $comment->website }}">
                                                {{ $comment->nickname }}
                                            </a>
                                        @else
                                            {{ $comment->nickname }}
                                        @endif
                                    </td>
                                    <td class="col-lg-4">
                                        <a href="{{ url('article/'.$comment->article_id) }}" target="_blank">
                                            {{ App\Article::find($comment->article_id)->title }}
                                        </a>
                                    </td>
                                    <td class="col-lg-1"><a href="{{ url('admin/comment/'.$comment->id.'/edit') }}" class="btn btn-success">编辑</a></td>
                                    <td class="col-lg-1">
                                        <form action="{{ url('admin/comment/'.$comment->id) }}" method="POST" style="display: inline;">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">删除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection