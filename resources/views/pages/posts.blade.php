@extends('layout.main')

@section('content')
<!-- Display blog posts -->
<div class="col-md-9 col-sm-12">
    <p class="h5 more-post border-bottom border-1 pb-2 mt-5 mb-2">More Posts</p>
    @foreach ($posts as $post)
    <div class="card border-1 mb-3">
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
                    <strong class="d-inline-block mb-2 text-primary-emphasis more-category mt-2">{{ $post->name }}</strong>
                    <p class="card-title h5 more-title">{{ $post->title }}</p>
                    <p class="card-subtitle small text-secondary more-created">Posted on {{ $post->created_at }} by {{ $post->author }}</p>
                    <!-- <p class="card-text mt-2 more-description">{{ $post->description }}</p> -->
                    <a href="{{ url('/content/' . $post->id) }}" class="text-decoration-none text-black border-bottom border-1 border-black p-2 continue-reading">Continue Reading...</a>

                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection