<?php

use App\Enums\CommonStatus;
use App\Enums\PageLayoutType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('page_banner_image')->nullable();
            $table->unsignedTinyInteger('status')->nullable()->default(CommonStatus::Active);
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->longText('others')->nullable();
            $table->unsignedTinyInteger('page_layout_type')->nullable()->default(PageLayoutType::OneColumn);
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
        Schema::dropIfExists('pages');
    }
}
