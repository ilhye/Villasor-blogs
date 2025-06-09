<nav class="navbar navbar-expand-lg">
    <div class="container d-flex flex-column align-items-center">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-4">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/blogs">Add Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('statuses') }}">Statuses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts') }}">All Posts</a>
                </li>
            </ul>
        </div>
    </div>
</nav>