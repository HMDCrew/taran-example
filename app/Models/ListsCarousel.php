<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ListsCarousel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'img_path'
    ];

    public function carousel($slide)
    {
        return DB::select('SELECT carousel_id FROM lists_carousels_pivot WHERE list_id= ?', [$slide]);
    }

}
