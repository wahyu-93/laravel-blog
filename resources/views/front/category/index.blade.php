@extends('front.layout.template')

@section('title', 'Bee Blog | Blog Pribadi')

@section('content')
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-12">
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                @forelse ($articles as $article)
                    <div class="col-md-4">
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
                @empty
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <a href="{{ url('/') }}" type="button" class="btn btn-sm btn-danger">Kembali</a>
                        <h3 class="mb-0">Data Tidak Ada</h3>
                    </div>
                @endforelse
            </div>
            <!-- Pagination-->
            <nav aria-label="Pagination" class="d-flex justify-content-center">
                {!! $articles->links() !!}
            </nav>
        </div>
    </div>
</div>
@endsection