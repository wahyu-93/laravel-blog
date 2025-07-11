@extends('front.layout.template')

@section('title', 'Bee Blog | Blog Pribadi')

@section('content')
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-12">
            <h5>All Category</h5>
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="text-center">
                                    <i class="fas fa-folder fa-5x"></i>

                                    <a href="{{ route('category.index', $category->slug) }}" style="text-decoration: none; color: black">
                                        <h6 class="card-title">
                                            {{ $category->name }} ({{ $category->articles_count }})
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
           
        </div>
    </div>
</div>
@endsection