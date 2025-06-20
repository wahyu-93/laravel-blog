@extends('front.layout.template')

@section('title', 'Bee Blog | Blog Pribadi')

@section('content')
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-12">
            {{-- pencarian --}}
            <div class="mb-3">
                <form method="GET">
                    @csrf
                    <div class="input-group">
                        <input class="form-control" type="text" name="keyword" placeholder="Ketik Judul Article .... " aria-label="Ketik Judul Article .... " aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="submit">Search</button>
                    </div>
                </form>
            </div>

            @if($keyword)
                <p>Showing Articles with keyword : <b>{{ $keyword }}</b></p>
            @endif
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-4">
                        <!-- Blog post-->
                        <div class="card mb-4" style="height: 34rem;">
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
                                 <a class="btn btn-primary" href="{{ route('post.show', $article->slug) }}">Read more →</a>
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
    </div>
</div>
@endsection