@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="{{ route('carousels.store') }}">
        @csrf

        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Carousel name</span>
            <input type="text" name="name" class="form-control" aria-label="carousel name" aria-describedby="inputGroup-sizing-sm" value="{{ old('name', '') }}">
        </div>
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror


        <div class="d-flex justify-content-end">
            <button class="btn btn-success" type="submit">Create</button>
        </div>
    </form>
</div>
@endsection
