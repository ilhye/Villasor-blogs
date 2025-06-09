@extends('layout.main')

@section('content')
<div class="row mt-4 mb-4">
    <p class="h1 title mt-4 mb-4">List of Categories</p>
    <ul>
        @foreach ($categories as $category)
        <li class="mb-2 ms-3">
            <a href="{{ route('byCategory', ['id' => $category->id]) }}" class="mb-3 text-decoration-none text-dark">{{ $category->name }}</a>
        </li>
        @endforeach
    </ul>
</div>
@endsection