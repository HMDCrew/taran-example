@extends('layouts.app')

@section('content')
<div class="container">

    <a class="btn btn-link" href="{{ route('carousels.edit', $carousel->carousel_id) }}">Back</a>

    <form method="post" action="{{ route('slides.update', $id) }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="carousel-id" value="{{ $carousel->carousel_id }}" />

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="slideTitle" value="{{ $slide->title }}">
            <div id="slideTitle" class="form-text">Slide Title</div>
        </div>
        @error('title')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror

        <div class="form-floating">
            <textarea class="form-control" placeholder="Description slide" id="description" name="description" style="height: 100px">{{ $slide->description }}</textarea>
            <label for="description">Description</label>
        </div>
        @error('description')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror

        <div class="mb-3">
            <label for="formFile" class="form-label"><img src="/{{ $slide->img_path }}" style="max-height: 250px;" ></label>
            <input class="form-control" type="file" id="formFile" name="formFile" value="{{ $slide->img_path }}">
        </div>
        @error('formFile')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
