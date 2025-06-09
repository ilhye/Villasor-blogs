@extends('layout.main')

@section('content')
<div class="row">
    <p class="h1 title mt-4 mb-4">List of Statuses</p>
    <ul>
        @foreach ($statuses as $status)
        <li class="mb-3 ms-3">
            <a href="{{ route('byStatus', ['id' => $status->id]) }}" class="mb-3 text-decoration-none text-dark">{{ $status->name }}</a>
        </li>
        @endforeach
    </ul>

</div>
@endsection