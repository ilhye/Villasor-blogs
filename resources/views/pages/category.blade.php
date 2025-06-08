@extends('layout.main')

@section('content')
<!-- Display list of category  -->
<div class="row mt-4 mb-4">
    <p class="h1 category-title mt-4 mb-4">List of Categories</p>
    <ul class="mb-4">
        @foreach ($categories as $category)
        <li>{{ $category->name }}</li>
        @endforeach
    </ul>
</div>
@endsection