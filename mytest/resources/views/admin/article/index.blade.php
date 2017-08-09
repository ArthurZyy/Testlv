@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">文章管理</div>

                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <a href="{{ url('admin/article/create') }}" class="btn btn-lg btn-primary">新增</a>

                        @foreach ($articles as $article)
                            <hr>
                            <div class="article">
                                <h4>{{ $article->title }}</h4>
                                <div class="content">
                                    <p>
                                        <?php echo str_limit(str_replace("\n","<br/>",$article->body),300); ?>
                                    </p>
                                </div>
                            </div>
                            <a href="{{ url('admin/article/'.$article->id.'/edit') }}" class="btn btn-success">编辑</a>
                            {{--代码参考--}}
                            {{--{!! Form::open(array('url' => route($viewPath . '.destroy', ['id'=>$row->id]), 'style'=>'margin:0;display:inline;', 'onsubmit'=>'return confirm("确定要删除该' .$modelTitle. '？");')) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                {!! Form::submit('删除', array('class' => 'btn btn-link btn-xs')) !!}
                                {!! Form::close() !!}--}}

                            <form action="{{ url('admin/article/'.$article->id) }}" method="POST" style="display: inline;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">删除</button>
                            </form>
                        @endforeach
                    </div>

                    <div id="links">
                        {{ $articles->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection