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
                        <x-card-article :article="$article"/>
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