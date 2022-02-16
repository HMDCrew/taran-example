@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        @foreach ($partners as $partner)
            <div class="col-12 col-md-3 mb-4">
                <div class="card">
                    <img class="card-img-top" src="/{{ $partner->path_img }}" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">{{ $partner->name }} {{ $partner->surname }}</h4>
                        <p class="card-text">{{ $partner->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <ul class="pagination mt-4 justify-content-center">
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
