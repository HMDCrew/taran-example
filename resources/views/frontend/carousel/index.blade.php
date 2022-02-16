<div id="carouselExampleDark-{{ $slug }}" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach ($slides as $slide)
            <button type="button" data-bs-target="#carouselExampleDark-{{ $slug }}" data-bs-slide-to="{{ $loop->index }}" {{ ($loop->index == 0 ? "class=active aria-current=true" : '') }} aria-label="Slide {{ $loop->index }}"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach ($slides as $slide)
            <div class="carousel-item {{ ($loop->index == 0 ? "active" : '') }}" data-bs-interval="10000">
                <img src="/{{ $slide->img_path }}" class="d-block w-100" alt="{{ $slide->title }}">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ $slide->title }}</h5>
                    <p>{{ $slide->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark-{{ $slug }}" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark-{{ $slug }}" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
