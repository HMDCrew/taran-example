<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::paginate(8);

        return view('backend.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'surname' => 'required|string',
            'description' => 'required|string',
            'formFile' => 'mimes:jpeg,png,jpg',
        ]);

        if( $request->formFile ) {
            $file = Storage::disk('public')->putFile('/uploaded/carousel', $request->file('formFile'));
        }

        Partner::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'description' => $request->input('description'),
            'path_img' => "storage/" . $file
        ]);

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = Partner::find($id);
        return view('backend.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'surname' => 'required|string',
            'description' => 'required|string',
            'formFile' => 'mimes:jpeg,png,jpg',
        ]);

        $partner = Partner::find($id);

        if( $request->formFile ) {
            $partner->update([
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'description' => $request->input('description'),
                'path_img' => "storage/" . Storage::disk('public')->putFile('/uploaded/partners', $request->file('formFile'))
            ]);
        } else {
            $partner->update([
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'description' => $request->input('description'),
            ]);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Partner::find($id)->delete();
        return $this->index();
    }
}
