@extends('front.layout.template')

@section('title', 'Bee Blog | Blog Pribadi')

@section('content')
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <a href="{{ route('post.show', $article->slug) }}"><img class="card-img-top feature-img" src="{{ asset('storage/back/article/' . $article->img ) }}" alt="belum ada foto" /></a>
                <div class="card-body">
                    <div class="small text-muted">{{ \Carbon\Carbon::parse($article->created_at)->format('F j, Y') }}</div>
                    <h2 class="card-title">{{ $article->title }}</h2>
                    <p class="card-text">{!! $article->description !!}</p>
                </div>
            </div>
        </div>
        <!-- Side widgets-->
        @include('front.layout._side-widget')
    </div>
</div>
@endsection