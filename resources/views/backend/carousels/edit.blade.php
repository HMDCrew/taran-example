@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="{{ route('carousels.update', $carousel->id) }}">
        @csrf
        @method('put')

        <div class="input-group input-group-sm mb-4">
            <span class="input-group-text" id="inputGroup-sizing-sm">Carousel name</span>
            <input type="text" name="name" class="form-control" aria-label="carousel name" aria-describedby="inputGroup-sizing-sm" value="{{ old('name', $carousel->name) }}">
        </div>
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror

        <div class="d-flex justify-content-between">
            <a class="btn btn-primary" href="{{ route('slides.create', $carousel->id) }}">Add slide</a>
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </form>

    <div class="row">
        @foreach ($slides as $slide)
            <div class="col-12 col-md-3 mt-4">
                <div class="card mx-auto">
                    <img src="/{{ $slide->img_path }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $slide->title }}</h5>
                        <p class="card-text">{{ $slide->description }}</p>

                        <div class="d-flex justify-content-between">
                            <form action="{{ route('slides.distroy', $slide->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="carousel-id" value="{{ $carousel->id }}">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('slides.edit', $slide->id) }}" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
