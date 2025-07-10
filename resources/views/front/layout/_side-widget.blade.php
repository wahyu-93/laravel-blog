<div class="col-lg-4" data-aos="fade-left">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <form method="POST" action="{{ route('search.index') }}">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Ketik Judul Article .... " aria-label="Ketik Judul Article .... " aria-describedby="button-search" />
                    <button class="btn btn-primary" id="button-search" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            @foreach ($categories as $category)
                <a href="{{ route('category.index', $category->slug) }}" class="category-link">
                    <span class="badge bg-primary">{{ $category->name }} ({{$category->articles_count}})</span>
                </a>
            @endforeach
        </div>
    </div>
    
<!-- Populer Post-->
<div class="card mb-4">
    <div class="card-header">Pupuler Post</div>
    <div class="card-body">
        @foreach ($populerPost as $populer)
            <div class="d-flex align-items-start mb-3">
                <a href="{{ route('post.show', $populer->slug) }}">
                    <img 
                        src="{{ asset('storage/back/article/' . $populer->img ) }}" 
                        alt="belum ada foto" 
                        class="rounded" 
                        style="width: 50px; height: 50px; object-fit: cover;"
                    />
                </a>

                <div class="ms-3">
                    <a href="{{ route('post.show', $populer->slug) }}" class="text-decoration-none text-dark">
                        <h6 class="mb-1 fw-semibold text-danger">{{ $populer->title }}</h6>
                    </a>
                    <div class="small text-muted">
                        {{ \Carbon\Carbon::parse($populer->created_at)->format('F j, Y') }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Related Post-->
@if($relatedPost)
    <div class="card mb-4">
        <div class="card-header">Related Post</div>
        <div class="card-body">
            @foreach ($relatedPost as $related)
                <div class="d-flex align-items-start mb-3">
                    <a href="{{ route('post.show', $related->slug) }}">
                        <img 
                            src="{{ asset('storage/back/article/' . $related->img ) }}" 
                            alt="belum ada foto" 
                            class="rounded" 
                            style="width: 50px; height: 50px; object-fit: cover;"
                        />
                    </a>

                    <div class="ms-3">
                        <a href="{{ route('post.show', $related->slug) }}" class="text-decoration-none text-dark">
                            <h6 class="mb-1 fw-semibold text-danger">{{ $related->title }}</h6>
                        </a>
                        <div class="small text-muted">
                            {{ \Carbon\Carbon::parse($related->created_at)->format('F j, Y') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
</div>