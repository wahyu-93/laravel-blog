@extends('front.layout.template')

@section('title', $article->title)

@section('content')
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <a href="{{ route('post.show', $article->slug) }}"><img class="card-img-top feature-img" src="{{ asset('storage/back/article/' . $article->img ) }}" alt="belum ada foto" /></a>
                <div class="card-body">
                    <h2 class="card-title text-danger">{{ $article->title }}</h2>
                    <div class="small text-muted">{{ \Carbon\Carbon::parse($article->created_at)->format('l, d M Y H:i') }} | Dilihat {{ $article->views }} Kali</div>
                    <p class="card-text">{!! $article->description !!}</p>
                </div>
            </div>
        </div>
        <!-- Side widgets-->
        @include('front.layout._side-widget')
    </div>
</div>
@endsection