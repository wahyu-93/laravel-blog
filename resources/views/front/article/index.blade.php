@extends('front.layout.template')

@section('title', 'Bee Blog | Blog Pribadi')

@section('content')
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-12" data-aos="fade-up">
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
                        <x-card-article :article="$article" />
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