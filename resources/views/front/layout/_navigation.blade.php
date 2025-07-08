<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#!">Bee Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('article.index') }}">Article</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categoryNavbars as $category)
                            <li><a class="dropdown-item" href="{{ route('category.index', $category->slug) }}">{{ $category->name }}</a></li>    
                        @endforeach
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ url('article') }}">All Category</a></li>
                    </ul>

                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>