<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    public function __invoke()
    {
        $partners = Partner::paginate(12);
        return view('frontend.partner', compact('partners'));
    }
}
