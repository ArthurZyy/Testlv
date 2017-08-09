@extends('layouts.app')
@section('content')
    <div id="title" style="text-align: center;">
        <div style="padding: 5px; font-size: 16px;">
            <img src="{{ url(asset('/images/home_.jpg')) }}" class="img-responsive" alt="Responsive image">

        </div>
    </div>
    <hr>
    <div id="content">
        <ul>
            @foreach ($articles as $article)
                <div style="margin: 50px 0;">
                    <div class="title">
                        <a href="{{ URL('article/'.$article->id) }}">
                            <h4>{{ $article->title }}</h4>
                        </a>
                    </div>
                    <div class="body">
                        <p>{{ str_limit($article->body) }}</p>
                        <hr>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>
    <div id="links">
        {{ $articles->links() }}
    </div>
@endsection