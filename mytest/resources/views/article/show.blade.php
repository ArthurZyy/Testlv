@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            {{--文章--}}
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $article->title }}（{{ $article->updated_at }}）
                        <div style="float:right ">
                            <a href="{{ url('/') }}" class="Link">返回首页</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <p><?php echo str_replace("\n","<br/><br/>",$article->body); ?></p>
                    </div>
                </div>
            </div>

            {{--增加评论--}}
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div id="comments" class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">回复</div>
                    <div id="new" class="panel-body">
                        <form action="{{ url('comment') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <div class="form-group">
                                <label>名字</label>
                                <input type="text" name="nickname" class="form-control" style="width: 300px;" required="required">
                            </div>
                            <div class="form-group">
                                <label>邮箱</label>
                                <input type="email" name="email" class="form-control" style="width: 300px;">
                            </div>
                            <div class="form-group">
                                <label>主页</label>
                                <input type="text" name="website" class="form-control" style="width: 300px;">
                            </div>
                            <div class="form-group">
                                <label>内容</label>
                                <textarea name="content" id="newFormContent" class="form-control" rows="10" required="required"></textarea>
                            </div>
                            <button type="submit" class="btn btn-lg btn-success col-lg-12">提交</button>
                        </form>
                    </div>
                </div>
            </div>


            {{--评论列表--}}
            <script>
                function reply(a) {
                    var nickname = a.parentNode.parentNode.firstChild.nextSibling.getAttribute('data');
                    var textArea = document.getElementById('newFormContent');
                    textArea.innerHTML = '@'+nickname+' ';
                }
            </script>
            <div id="comments" class="col-md-10 col-md-offset-1">

                @foreach($article->hasManyComments as $comment)
                    <div class="panel panel-default">

                        {{--回复者及回复时间--}}
                        <div class="nickname panel-heading" data="{{ $comment->nickname }}">
                            {{--判断评论者的主页是否存在--}}
                            @if($comment->website)
                                <a href="$comment->website">
                                    <h4>{{ $comment->nickname }}</h4>
                                </a>
                            @else
                                <h4>{{ $comment->nickname }}</h4>
                            @endif

                        </div>

                        <div class="content">
                            <p style="padding: 20px;">
                                {{ $comment->content }}
                            </p>
                        </div>
                        <div class="reply" style="text-align: right; padding: 5px;">
                            {{ $comment->created_at }}&nbsp;|&nbsp; <a href="#new" onclick="reply(this);">回复</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection