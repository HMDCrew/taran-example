@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="{{ route('slides.store', $id) }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="slideTitle">
            <div id="slideTitle" class="form-text">Slide Title</div>
        </div>
        @error('title')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror

        <div class="form-floating">
            <textarea class="form-control" placeholder="Description slide" id="description" name="description" style="height: 100px"></textarea>
            <label for="description">Description</label>
        </div>
        @error('description')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror

        <div class="mb-3">
            <label for="formFile" class="form-label">Slide image</label>
            <input class="form-control" type="file" id="formFile" name="formFile">
        </div>
        @error('formFile')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
