@extends('layout.main')

@section('content')
<!-- Display blog posts when continue reading is clicked  -->
    <div class="row">
        <div class="col-md-12">
            <img src="{{ $posts->image_url }}" alt="post-image" class="img-fluid rounded w-100 mt-3 mb-3 post-image" style="height: 200px; object-fit: cover;">
            <strong class="d-inline-block mb-2 text-primary-emphasis mt-4 post-category">{{ $posts->name }}</strong>
            <h1 class="post-title">{{ $posts->title }}</h1>
            <p class="small text-secondary post-created">Posted at {{ $posts->created_at }} by {{ $posts->author }}</p>
            <p class="post-text mb-4 post-content">{{ $posts->content }}</p>
        </div>
    </div>
@endsection