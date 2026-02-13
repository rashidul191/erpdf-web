<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_category_id')->nullable()->constrained('room_categories');
            $table->string(column: 'name')->nullable();
            $table->string('slug')->nullable();
            $table->string('time_duration')->nullable();
            $table->decimal('price')->nullable()->default(0);
            $table->decimal('size')->nullable()->default(0);
            $table->string('view')->nullable();
            $table->string('image')->nullable();
            $table->json('gallery_image')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('rooms');
    }
}
