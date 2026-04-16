<?php

use App\Enums\CommonStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentManagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_manages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->nullable()->constrained('menus');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->unsignedTinyInteger('status')->nullable()->default(CommonStatus::Active);
            $table->longText('short_description')->nullable();
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
        Schema::dropIfExists('content_manages');
    }
}
