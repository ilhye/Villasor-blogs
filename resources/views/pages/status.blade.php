@extends('layout.main')

@section('content')
<div class="row">
    <p class="h1 status-title mt-4 mb-4">Statuses</p>
    <ul class="mb-4">
        @foreach ($statuses as $status)
            <li>{{ $status->name }}</li>
        @endforeach
    </ul>
</div>
@endsection