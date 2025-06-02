@extends('back.layout.template')

@section('title', 'Article')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Detail Article</h1>
        </div>

        <div class="mt-3">
            <table class="table table-bordered table-striped">
                <tr>
                    <td>Title</td>
                    <td>:</td>
                    <td> {{ $article->title }}</td>
                </tr>

                 <tr>
                    <td>Category</td>
                    <td>:</td>
                    <td> {{ $article->Category->name }}</td>
                </tr>

                <tr>
                    <td>Description</td>
                    <td>:</td>
                    <td>{!! $article->description !!}</td>
                </tr>

                <tr>
                    <td>Image</td>
                    <td>:</td>
                    <td>
                        <img src="{{ asset('storage/back/article/' . $article->img) }}" alt="{{ $article->slug }}" width="25%">
                    </td>
                </tr>

                <tr>
                    <td>Views</td>
                    <td>:</td>
                    <td> {{ $article->views }}</td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>:</td>
                    @if($article->status == 0)
                        <td>
                            <span class="badge bg-danger">Private</span>
                        </td>
                    @else 
                        <td>
                            <span class="badge bg-success">Published</span>
                        </td>
                    @endif
                </tr>

                <tr>
                    <td>Publish Date</td>
                    <td>:</td>
                    <td>{{ $article->publish_date }}</td>
                </tr>   
            </table>

            <div class="text-end">
                <a href="{{ route('articles.index') }}" class="btn btn-primary btn-sm">Back</a>
            </div>
        </div>
    </main>
@endsection