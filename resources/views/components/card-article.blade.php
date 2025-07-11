<div class="card mb-4" style="height: 34rem;" data-aos="fade-up">
    <a href="{{ route('post.show', $article->slug) }}"><img class="card-img-top article-img" src="{{ asset('storage/back/article/' . $article->img ) }}" alt="belum ada foto"/></a>
    <div class="card-body">
        <div class="small text-muted">
            <i class="fa-solid fa-calendar-days me-2"></i> {{ \Carbon\Carbon::parse($article->created_at)->format('F j, Y') }} |
            {{ $article->Category->name }}
        </div>

        <h2 class="card-title h5">{{ $article->title }}</h2>
        <p class="card-text">{!! Illuminate\Support\Str::limit(strip_tags($article->description), 75) !!}</p>
    </div>

    <div class="card-footer" style="background-color: transparent; border-top: none;">
            <a class="btn btn-sm btn-danger float-end" href="{{ route('post.show', $article->slug) }}">Selengkapnya →</a>
    </div>
</div>