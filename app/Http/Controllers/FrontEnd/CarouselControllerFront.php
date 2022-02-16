<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousel;
use Illuminate\Support\Str;

class CarouselControllerFront extends Controller
{
    public function slider($id)
    {
        $carousel = Carousel::find($id);
        $slides = collect($carousel->slides($id));
        $slug = Str::slug($carousel->name);

        return view('frontend.carousel.index', compact('slides', 'slug'));
    }
}
