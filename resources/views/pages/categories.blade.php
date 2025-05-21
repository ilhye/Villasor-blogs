@extends('layout.main')

@section('content')
<!-- Display blog posts based on category  -->
<div class="row mt-4 mb-4">
    @foreach($posts as $post)
        <h2 class="mb-3 category">{{ $post->name }}</h2>
        <div class="card border-0 mb-3">
            <div class="row">
                <div class="col-6 col-md-3">
                    <img src="{{ $post->image_url }}" alt="post-image" class="img-fluid rounded w-100">
                </div>
                <div class="col-6 col-md-9">
                    <div class="card-body p-0">
                        <p class="card-title h5 post-title">{{ $post->title }}</p>
                        <p class="card-subtitle small text-secondary post-created">Posted on {{ $post->created_at }} by {{ $post->author }}</p>
                        <p class="card-text mt-2 post-description">{{ $post->description }}</p>
                        <a href="{{ url('/content/' . $post->id) }}" class="text-decoration-none text-black border-bottom border-1 border-black p-2 continue-reading">Continue Reading...</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection