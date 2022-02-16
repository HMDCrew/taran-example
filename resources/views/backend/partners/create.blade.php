@extends('layouts.app')

@section('content')
<div class="container">

    <form method="post" action="{{ route('partners.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="namePartner" value="{{ old('name', '') }}">
            <div id="namePartner" class="form-text">Name partner</div>
        </div>
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror

        <div class="mb-3">
            <label for="surname" class="form-label">Surname</label>
            <input type="text" class="form-control" id="surname" name="surname" aria-describedby="surnamePartner" value="{{ old('surname', '') }}">
            <div id="surnamePartner" class="form-text">Surname partner</div>
        </div>
        @error('surname')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror


        <div class="form-floating">
            <textarea class="form-control" placeholder="Description partner" id="description" name="description" style="height: 100px">{{ old('description', '') }}</textarea>
            <label for="description">Description</label>
        </div>
        @error('description')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror

        <div class="mb-3">
            <input class="form-control" type="file" id="formFile" name="formFile">
        </div>
        @error('formFile')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-primary">Create</button>
    </form>

</div>
@endsection
