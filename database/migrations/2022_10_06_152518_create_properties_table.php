<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('title');
            $table->string('title_slug');
            $table->double('price', 10, 2);
            $table->enum('purpose', ['sale', 'rent']);
            $table->enum('kondisi', ['new', 'secondary'])->nullable();
            $table->string('type');
            $table->integer('floor');
            $table->integer('bedroom');
            $table->integer('bathroom');
            $table->integer('luas_bangunan');
            $table->integer('luas_tanah');
            $table->string('provinsi');
            $table->string('city');
            $table->string('daerah');
            $table->string('address');
            $table->text('description');
            $table->text('nearby')->nullable();
            $table->text('cover_image');
            $table->text('video')->nullable();
            $table->string('agent');
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
        Schema::dropIfExists('properties');
    }
}
