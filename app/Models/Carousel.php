<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Carousel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];


    public function slides($carousel)
    {
        return DB::select('SELECT id, title, description, img_path FROM lists_carousels, lists_carousels_pivot WHERE id=lists_carousels_pivot.list_id AND lists_carousels_pivot.carousel_id = ?', [$carousel]);
    }
}
