<div class="col-lg-4">
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
                <span class="badge bg-primary">{{ $category->name }}</span>
            @endforeach
        </div>
    </div>
    
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Side Widget</div>
        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
    </div>
</div>