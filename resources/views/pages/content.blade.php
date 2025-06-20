@extends('layout.main')

@section('content')
<!-- Display blog posts -->
<div class="w-50 mx-auto">
    @if($viewType === 'all')
    <p class="h2 title pb-2 mt-5 mb-2">All Blog Post</p>
    @elseif($viewType === 'byStatus')
    <p class="h2 title pb-2 mt-5 mb-2">Status Content</p>
    @elseif($viewType === 'byCategory')
    <p class="h2 title pb-2 mt-5 mb-2">Category Content</p>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    @foreach ($posts as $post)
    <div class="card m-auto p-3 mb-4">
        <!-- Profile -->
        <div class="d-flex align-items-start mt-3">
            <img src="https://i.pinimg.com/736x/06/c5/34/06c53402078b109af7bb0e1b2d8bfcba.jpg"
                alt="profile_pic"
                class="rounded-circle me-2"
                style="width: 40px; height: 40px; object-fit: cover;">

            <!-- Username and time -->
            <div class="w-100">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="d-flex align-items-center gap-2">
                        <p id="username" class="mb-0 fw-semibold">{{ $post->user->name }}</p>
                    </div>
                    <!-- Show deletion option -->
                    <i class="bi bi-three-dots"></i>
                </div>
                <small class="text-muted">{{ $post->created_at }}</small>
            </div>
        </div>

        <!-- Blog Content -->
        <div class="card-body">
            <p class="blog-description mb-2">{{ $post->description }}</p>
            <img src="{{ $post->image_url }}"
                alt="post"
                class="img-fluid rounded w-100 border">
            <hr>
            <ul class="list-unstyled d-flex text-center w-100 p-0 m-0 interaction">
                <li class="flex-fill" onclick="changeColor()">
                    <i class="bi bi-heart-fill text-danger me-1"></i>Like
                </li>
                <li class="flex-fill">
                    <a class="text-decoration-none text-dark" data-bs-toggle="collapse" href="#addComment{{ $post->id }}" role="button" aria-expanded="false" aria-controls="addComment{{ $post->id }}">
                        <i class="bi bi-chat-fill text-primary me-1"></i>Comment
                    </a>
                </li>
            </ul>
            <hr>

            <!-- Add comment -->
            <div class="collapse w-100" id="addComment{{ $post->id }}">
                <form method="POST" action="{{ route('submit.comment', ['id' => $post->id]) }}">
                    @csrf
                    <textarea class="form-control" placeholder="Leave a comment here" rows="3" name="comment"></textarea>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </div>
                </form>

            </div>
            <!-- Comments section -->
            <div class="d-flex align-items-start mt-3">

                <!-- Profile picture -->
                <img src="https://i.pinimg.com/736x/06/c5/34/06c53402078b109af7bb0e1b2d8bfcba.jpg"
                    alt="profile_pic"
                    class="rounded-circle me-2"
                    style="width: 40px; height: 40px; object-fit: cover;">

                <!-- Comment content -->
                <div class="w-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <p id="username" class="mb-1 fw-semibold">John Doe</p>
                        <small class="text-muted">3h</small>
                    </div>
                    <p class="mb-0">Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            <hr>
            <div class="d-flex align-items-start mt-3">
                <!-- Profile picture -->
                <img src="https://i.pinimg.com/736x/06/c5/34/06c53402078b109af7bb0e1b2d8bfcba.jpg"
                    alt="profile_pic"
                    class="rounded-circle me-2"
                    style="width: 40px; height: 40px; object-fit: cover;">

                <!-- Comment content -->
                <div class="w-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <p id="username" class="mb-1 fw-semibold">John Doe</p>
                        <small class="text-muted">3h</small>
                    </div>
                    <p class="mb-0">Lorem ipsum dolor sit amet.</p>
                </div>
            </div>

        </div>
    </div>

    <!--Section: Newsfeed-->
    <!-- <div class=" card border-1 mb-3">
        <div class="row">
            <div class="col-6 col-md-3">
                <img src="{{ $post->image_url }}" alt="post-image" class="img-fluid rounded w-100 more-image">
            </div>
            <div class="col-6 col-md-9">
                <div class="card-body p-0">
                    <form method="POST" action="{{ route('blog.delete', $post->id) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger position-absolute top-0 end-0 m-3 w-25">Delete Post</button>
                    </form>
                    <p><span class="badge p-2 position-absolute top-0 start-0 m-3 shadow">{{ $post->status_name }}</span> </p>
                    <strong class="d-inline-block mb-2 text-primary-emphasis blog-category mt-2">{{ $post->category_name }}</strong>
                    <p class="card-title h5 blog-title">{{ $post->title }}</p>
                    <p class="card-subtitle small text-secondary blog-created">Posted on {{ $post->created_at }} by {{ $post->author }}</p>
                    <p class="card-text mt-2 blog-description">{{ $post->description }}</p>
                </div>
            </div>
        </div>
    </div> -->
    @endforeach
</div>
@endsection