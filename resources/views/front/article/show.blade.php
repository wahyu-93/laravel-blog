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
                    <div class="small text-muted">
                        <i class="fa-solid fa-calendar-days me-2"></i>{{ \Carbon\Carbon::parse($article->created_at)->format('l, d M Y H:i') }} 
                        <i class="fa-solid fa-eye mx-2"></i> Dilihat {{ $article->views }} Kali 
                        <i class="fa-solid fa-pen-to-square mx-2"></i> Post By {{ $article->user->name }}
                    </div>
                    <p class="card-text">{!! $article->description !!}</p>
                    <h6>Share This Artikel</h6>
                    <div class="mt-2">
                        <button class="btn btn-lg btn-primary">
                           <i class="fa-brands fa-facebook fa-xl"></i>
                        </button>
                        <button class="btn btn-lg btn-success">
                            <i class="fa-brands fa-whatsapp fa-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Side widgets-->
        @include('front.layout._side-widget')
    </div>
</div>
@endsection