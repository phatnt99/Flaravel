<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flowers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('catalog_id')->references('id')->on('flower_catalogs')->onDelete('cascade');
            $table->string('name');
            $table->string('color');
            $table->double('price', 8,2);
            $table->integer('discount');
            $table->string('image_link');
            $table->text('image_list');
            $table->integer('view');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flowers');
    }
}
