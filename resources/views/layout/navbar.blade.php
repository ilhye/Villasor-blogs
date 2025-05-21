<p class="h1 text-center brand mt-2 mb-2">MyBlog</p>
<nav class="navbar navbar-expand-lg">
    <div class="container d-flex flex-column align-items-center">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-4">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post', ['name' => 'Education']) }}">Education</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post', ['name' => 'Entertainment']) }}">Entertainment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post', ['name' => 'Technology']) }}">Technology</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post', ['name' => 'Sports']) }}">Sports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post', ['name' => 'Politics']) }}">Politics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post', ['name' => 'Health']) }}">Health</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post', ['name' => 'Travel']) }}">Travel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post', ['name' => 'Food']) }}">Food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post', ['name' => 'Lifestyle']) }}">Lifestyle</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post', ['name' => 'Business']) }}">Business</a>
                </li>
            </ul>
        </div>
    </div>
</nav>