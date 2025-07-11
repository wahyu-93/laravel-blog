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
                    <div class="small text-muted">
                        <i class="fa-solid fa-calendar-days me-2"></i>
                        {{ \Carbon\Carbon::parse($lastArticle->created_at)->format('F j, Y') }}
                    </div>
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
                        <x-card-article :article="$article" />
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