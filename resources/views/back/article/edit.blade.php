@extends('back.layout.template')

@section('title', 'Edit Article')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create Article</h1>
        </div>
 
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
           
        <div class="mt-3">
            <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="row mb-3">
                    <div class="col-6">
                        <label for="title" class="mb-2">Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $article->title }}">
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-6">
                        <label for="category_id" class="mb-2">Category</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="" hidden>Pilih Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected($article->category_id == $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="mb-2">Description</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{ old('description') ?? $article->description }}</textarea>
                    @error('description')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="img" class="mb-2">Image</label>
                    <input type="hidden" name="oldImg" value="{{ $article->img }}">
                    <input type="file" name="img" id="img" class="form-control @error('img') is-invalid @enderror">
                    @error('img')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <img src="{{ asset('storage/back/article/' . $article->img) }}" alt="{{ $article->slug }}" style="max-width: 300px;" id="previewImage">
                </div>

                <div class="row mb-3">
                    <div class="col-6">
                        <label for="status" class="mb-2">Status</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="" hidden>Pilih Status</option>
                            <option value="1" @selected($article->status == '1')>Publish</option>
                            <option value="0" @selected($article->status == '0')>Private</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-6">
                        <label for="publish_date" class="mb-2">Publish Date</label>
                        <input type="date" name="publish_date" id="publish_date" class="form-control @error('publish_date') is-invalid @enderror" value="{{ $article->publish_date }}">
                         @error('publish_date')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </main>
@endsection

@push('js')
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
            // clipboard_handleImages: false
        };

        CKEDITOR.replace( 'description', options );

        document.getElementById('img').addEventListener('change', function(event) {
            const image = document.getElementById('previewImage');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    image.src = e.target.result;
                    image.style.display = 'block';
                }

                reader.readAsDataURL(file);
            } else {
                image.src = '#';
                image.style.display = 'none';
            }
        });
    </script>
@endpush