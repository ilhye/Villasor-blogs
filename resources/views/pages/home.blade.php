@extends('layout.main')

@section('content')
<div class="row mt-3">
    <!-- Header card -->
    <div class="col-md-8 col-sm-12 h-100">
        <div class="card border-0 p-3 header">
            <div class="card-body" style="width: 60%;">
                <h1 class="card-title mb-2 header-title">Title of a longer featured post</h1>
                <h6 class="card-subtitle mb-3 small header-posted">Posted on November 13, 2023 by AWSCC-DSWD</h6>
                <p class="card-text mb-2 header-text text-light small">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae malesuada ex, et sagittis ipsum. Nullam id nulla velit. Phasellus lobortis, enim iaculis varius viverra, felis lectus fringilla mi, at facilisis risus tellus ornare dolor. Nunc lacinia, elit non dictum iaculis, mi nulla porttitor leo, ut rutrum nisi tellus in sem. </p>
                <a href="/content" class="text-decoration-none text-light border-bottom border-2 p-2 continue-reading">Continue Reading...</a>
            </div>
        </div>
    </div>
    <!-- Recent post -->
    <div class="col-md-4 col-sm-12 h-100">
        <p class="h5 recent border-bottom border-1 pb-2 mb-2 mt-sm-4">Recent Posts</p>
        @foreach($recent as $recentPost)
        <div class="card border-0 mb-3">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <img src="{{ $recentPost->image_url }}" alt="cuteie cat" class="img-fluid rounded recent-image">
                </div>
                <div class="col-md-8 col-sm-6">
                    <div class="card-body p-0">
                        <p class="h5 mt-2 recent-title">{{ $recentPost->title }}</p>
                        <p class="small recent-content">{{ $recentPost->description }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- More posts -->
    <div class="col-md-9 col-sm-12">
        <p class="h5 more-post border-bottom border-1 pb-2 mt-5 mb-2">More Posts</p>
        @foreach ($posts as $post)
        <div class="card border-0 mb-3">
            <div class="row">
                <div class="col-6 col-md-3">
                    <img src="{{ $post->image_url }}" alt="post-image" class="img-fluid rounded w-100 more-image">
                </div>
                <div class="col-6 col-md-9">
                    <div class="card-body p-0">
                        <strong class="d-inline-block mb-2 text-primary-emphasis more-category">{{ $post->name }}</strong>
                        <p class="card-title h5 more-title">{{ $post->title }}</p>
                        <p class="card-subtitle small text-secondary more-created">Posted on {{ $post->created_at }} by {{ $post->author }}</p>
                        <p class="card-text mt-2 more-description">{{ $post->description }}</p>
                        <a href="{{ url('/content/' . $post->id) }}" class="text-decoration-none text-black border-bottom border-1 border-black p-2 continue-reading">Continue Reading...</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Add posts and socials -->
    <div class="col-md-3 col-sm-12">
        <div class="row">
            <div class="col-md-12 col-sm-6">
                <p class="h5 add border-bottom border-1 pb-2 mt-5 mb-2">Add Post</p>
                <button type="button" class="btn w-100 text-light add-btn" data-bs-toggle="modal" data-bs-target="#add-post">Click to add new post</button>

                <!-- Modal for adding new post -->
                <div class="modal fade" id="add-post" tabindex="-1" aria-labelledby="addPostLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title post-heading fs-5" id="addPostLabel">New Post</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('pages.submit') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="post-title" class="form-label">Post Title</label>
                                        <input type="text" class="form-control" id="post-title" name="title" placeholder="Enter post title">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="post-category" class="form-label">Post Category</label>
                                        <select name="category_id" id="post-category" class="form-select">
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="post-status" class="form-label">Status</label>
                                        <select name="status_id" id="post-status" class="form-select">
                                            @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="post-image" class="form-label">Post Image URL</label>
                                        <input type="text" class="form-control" id="post-image" name="image_url" placeholder="Enter image URL">
                                    </div>
                                    <div class="mb-3">
                                        <label for="post-author" class="form-label">Author</label>
                                        <input type="text" class="form-control" id="post-author" name="author" placeholder="Enter author name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="post-description" class="form-label">Post Description</label>
                                        <textarea class="form-control" name="description" id="post-description" rows="2" placeholder="Enter post description"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="post-content" class="form-label">Post Content</label>
                                        <textarea class="form-control" id="post-content" name="content" rows="5" placeholder="Enter post content"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social media links -->
            <div class="col-md-12 col-sm-6 mb-sm-2">
                <p class="h5 social border-bottom border-1 pb-2 mt-5 mb-2">Follow us</p>
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <i class="bi bi-facebook social-icon" style="font-size: 50px;"></i>
                    </div>
                    <div class="col-md-9 col-sm-9 mt-4">
                        <a href="https://www.facebook.com/" class="text-decoration-none text-black social-link">facebook.com</a>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <i class="bi bi-twitter-x social-icon" style="font-size: 50px;"></i>
                    </div>
                    <div class="col-md-9 col-sm-9 mt-4">
                        <a href="https://x.com/" class="text-decoration-none text-black social-link">X.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection