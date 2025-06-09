@extends('layout.main')

@section('content')
<!-- Display blog posts -->
<div class="col-md-9 col-sm-12">
    @if($viewType === 'all') 
        <p class="h2 title pb-2 mt-5 mb-2">All Posts</p>
    @elseif($viewType === 'byStatus')
        <p class="h2 title pb-2 mt-5 mb-2">Status Content</p>
    @elseif($viewType === 'byCategory')
        <p class="h2 title pb-2 mt-5 mb-2">Category Content</p>
    @endif

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
                    <p><span class="badge p-2 position-absolute top-0 start-0 m-3 shadow">{{ $post->status_name }}</span> </p>
                    <strong class="d-inline-block mb-2 text-primary-emphasis more-category mt-2">{{ $post->category_name }}</strong>
                    <p class="card-title h5 more-title">{{ $post->title }}</p>
                    <p class="card-subtitle small text-secondary more-created">Posted on {{ $post->created_at }} by {{ $post->author }}</p>
                    <p class="card-text mt-2 more-description">{{ $post->description }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection