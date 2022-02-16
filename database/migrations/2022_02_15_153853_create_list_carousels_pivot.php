<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListCarouselsPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists_carousels_pivot', function (Blueprint $table) {
            $table->foreignId('carousel_id')->references('id')->on('carousels')->cascadeOnDelete();
            $table->foreignId('list_id')->references('id')->on('lists_carousels')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lists_carousels_pivot');
    }
}
