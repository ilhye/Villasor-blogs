@extends('layout.main')

@section('content')
<div class="w-50 m-auto border p-4 rounded shadow mt-5 mb-4">
    <p class="h2 title text-center mb-2">Add Posts</p>
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
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary me-4" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-save">Save changes</button>
        </div>
    </form>
</div>

@endsection