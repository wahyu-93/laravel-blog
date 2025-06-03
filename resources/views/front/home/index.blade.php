@extends('front.layout.template')

@section('title', 'Bee Blog | Blog Pribadi')

@section('content')
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <a href="#!"><img class="card-img-top" src="{{ asset('storage/back/article/' . $lastArticle->img ) }}" alt="belum ada foto" width="850px" height="350px" /></a>
                <div class="card-body">
                    <div class="small text-muted">{{ \Carbon\Carbon::parse($lastArticle->created_at)->format('F j, Y') }}</div>
                    <h2 class="card-title">{{ $lastArticle->title }}</h2>
                    <p class="card-text">{!! Illuminate\Support\Str::limit(strip_tags($lastArticle->description), 200) !!}</p>
                    <a class="btn btn-primary" href="#!">Read more →</a>
                </div>
            </div>
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4" style="height: 34rem;">
                            <a href="#!"><img class="card-img-top" src="{{ asset('storage/back/article/' . $article->img ) }}" alt="belum ada foto" width="700px" height="350px" /></a>
                            <div class="card-body">
                                <div class="small text-muted">{{ \Carbon\Carbon::parse($article->created_at)->format('F j, Y') }}</div>
                                <h2 class="card-title h5">{{ $article->title }}</h2>
                                <p class="card-text">{!! Illuminate\Support\Str::limit(strip_tags($article->description), 75) !!}</p>
                            </div>

                            <div class="card-footer" style="background-color: transparent; border-top: none;">
                                 <a class="btn btn-primary" href="#!">Read more →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Pagination-->
            <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                    <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                    <li class="page-item"><a class="page-link" href="#!">15</a></li>
                    <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                </ul>
            </nav>
        </div>
        <!-- Side widgets-->
        @include('front.layout._side-widget')
    </div>
</div>
@endsection