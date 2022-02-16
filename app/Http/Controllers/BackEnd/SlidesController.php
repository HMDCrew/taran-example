<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ListsCarousel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SlidesController extends Controller
{
    public function create($id)
    {
        return view('backend.slides.create', compact('id'));
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'formFile' => 'required|mimes:jpeg,png,jpg',
        ]);

        if( $request->formFile ) {
            $file = Storage::disk('public')->putFile('/uploaded/carousel', $request->file('formFile'));
        }

        $slide = ListsCarousel::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'img_path' => "storage/" . $file
        ]);

        DB::table('lists_carousels_pivot')->insert([
            'carousel_id' => $id,
            'list_id'     => $slide->id,
        ]);

        return redirect()->route('carousels.edit', $id);
    }

    public function edit($id)
    {
        $slide = ListsCarousel::find($id);
        $carousel = ListsCarousel::carousel($id)[0];

        return view('backend.slides.edit', compact('slide', 'id', 'carousel'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'carousel-id' => 'required|numeric',
            'title' => 'required',
            'description' => 'required',
            'formFile' => 'mimes:jpeg,png,jpg',
        ]);

        $slide = ListsCarousel::find($id);

        if( $request->formFile ) {
            $slide->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'img_path' => "storage/" . Storage::disk('public')->putFile('/uploaded/carousel', $request->file('formFile'))
            ]);
        } else {
            $slide->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ]);
        }

        return redirect()->route('carousels.edit', $request->input('carousel-id'));
    }

    public function distroy(Request $request, $id)
    {
        $this->validate($request, [
            'carousel-id' => 'required|numeric',
        ]);

        ListsCarousel::find($id)->delete();
        return redirect()->route('carousels.edit', $request->input('carousel-id'));
    }
}
