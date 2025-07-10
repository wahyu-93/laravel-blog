@extends('front.layout.template')

@section('title', 'Bee Blog | Blog Pribadi')

@section('content')
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4" data-aos="fade-right">
                <a href="{{ route('post.show', $lastArticle->slug) }}"><img class="card-img-top feature-img" src="{{ asset('storage/back/article/' . $lastArticle->img ) }}" alt="belum ada foto" /></a>
                <div class="card-body">
                    <div class="small text-muted">{{ \Carbon\Carbon::parse($lastArticle->created_at)->format('F j, Y') }}</div>
                    <h2 class="card-title">{{ $lastArticle->title }}</h2>
                    <p class="card-text">{!! Illuminate\Support\Str::limit(strip_tags($lastArticle->description), 200) !!}</p>
                    <a class="btn btn-sm btn-danger float-end" href="{{ route('post.show', $lastArticle->slug) }}">Selengkapnya →</a>
                </div>
            </div>
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4" style="height: 34rem;" data-aos="fade-up">
                            <a href="{{ route('post.show', $article->slug) }}"><img class="card-img-top article-img" src="{{ asset('storage/back/article/' . $article->img ) }}" alt="belum ada foto"/></a>
                            <div class="card-body">
                                <div class="small text-muted">
                                    {{ \Carbon\Carbon::parse($article->created_at)->format('F j, Y') }} |
                                    {{ $article->Category->name }}
                                </div>

                                <h2 class="card-title h5">{{ $article->title }}</h2>
                                <p class="card-text">{!! Illuminate\Support\Str::limit(strip_tags($article->description), 75) !!}</p>
                            </div>

                            <div class="card-footer" style="background-color: transparent; border-top: none;">
                                 <a class="btn btn-sm btn-danger float-end" href="{{ route('post.show', $article->slug) }}">Selengkapnya →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Pagination-->
            <nav aria-label="Pagination" class="d-flex justify-content-center">
                {!! $articles->links() !!}
            </nav>
        </div>
        <!-- Side widgets-->
        @include('front.layout._side-widget')
    </div>
</div>
@endsection