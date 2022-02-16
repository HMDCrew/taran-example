@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body p-0">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ SliderFront(7) }}

                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        @foreach ($partners as $partner)
            <div class="col-12 col-md-4 mb-4">
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

</div>
@endsection
