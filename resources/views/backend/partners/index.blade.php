@extends('layouts.app')

@section('content')
<div class="container">

    <div class="mb-4">
        <a href="{{ route('partners.create') }}" class="btn btn-success">Add Partner</a>
    </div>

    <div class="row">
        @foreach ($partners as $partner)
            <div class="col-12 col-md-3 mb-4">
                <div class="card">
                    <img class="card-img-top" src="/{{ $partner->path_img }}" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">{{ $partner->name }} {{ $partner->surname }}</h4>
                        <p class="card-text">{{ $partner->description }}</p>

                        <div class="d-flex justify-content-between">
                            <form action="{{ route('partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-primary">Edit</a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <ul class="pagination mt-4">
        <li class="page-item">
            <a
                class="page-link"
                href="{{ $partners->previousPageUrl() }}">Previous
            </a>
        </li>

        @for ($i = 1; $i <= $partners->lastPage(); $i++)
            <li class="page-item {{$partners->currentPage() == $i ? 'active' : ''}}">
                <a
                    class="page-link"
                    href="{{ $partners->url($i) }}">{{$i}}
                </a>
            </li>
        @endfor

        <li class="page-item">
            <a class="page-link" href="{{ $partners->nextPageUrl() }}">Next</a>
        </li>
    </ul>
</div>
@endsection
