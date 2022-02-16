@extends('layouts.app')

@section('content')
<div class="container">

    <a class="btn btn-primary mb-4" href="{{ route('carousels.create') }}">New slider</a>

    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <td>ID</td>
                    <td class="w-100">Name</td>
                    <td class="shortcode">shortcode</td>
                    <td class="actions">Actions</td>
                </tr>
            </thead>
            <tbody>

                @foreach ($carousels as $carousel)
                    <tr>
                        <td>{{ $carousel->id }}</td>
                        <td>{{ $carousel->name }}</td>
                        <td>&lcub;&lcub; SliderFront({{$carousel->id}}) &rcub;&rcub;</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('carousels.edit', $carousel->id) }}">View</a>
                            <form class="d-inline" action="{{ route('carousels.destroy', $carousel->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
