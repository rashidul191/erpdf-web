<?php

use App\Enums\CommonStatus;
use App\Enums\IsAgreeStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->nullable()->constrained('pages');
            $table->foreignId('menu_id')->nullable()->constrained('menus');
            $table->foreignId('sub_menu_id')->nullable()->constrained('menus');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->integer('serial')->nullable();
            $table->unsignedTinyInteger('is_custom')->nullable()->default(IsAgreeStatus::No);
            $table->unsignedTinyInteger('status')->nullable()->default(CommonStatus::Active);
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
        Schema::dropIfExists('menus');
    }
}
