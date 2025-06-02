@extends('back.layout.template')

@section('title', 'Dashboard')

@section('company-name', 'Bee Blog')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="card text-bg-primary mb-3" style="max-width: 100&;">
                    <div class="card-header">
                        <h5> Total Article </h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalArticle }} Articles</h5>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card text-bg-secondary mb-3" style="max-width: 100&;">
                    <div class="card-header">
                        <h5> Total Category </h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalCategory }} Category</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-6">
                <h5>Lates Articles</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Created_ad</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($latesArticle as $latest)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $latest->title }}</td>
                                <td>{{ $latest->Category->name }}</td>
                                <td>{{ $latest->created_at }}</td>
                                <td class="text-center">
                                    <a href="{{ route('articles.show',$latest) }}" class="btn btn-sm btn-secondary">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>

            <div class="col-6">
                <h5>Populer Articles</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Views</th>
                            <th></th>
                        </tr>
                    </thead>

                     <tbody>
                        @foreach ($populerArticle as $populer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $populer->title }}</td>
                                <td>{{ $populer->Category->name }}</td>
                                <td>{{ $populer->views }}</td>
                                <td class="text-center">
                                    <a href="{{ route('articles.show',$populer) }}" class="btn btn-sm btn-secondary">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection