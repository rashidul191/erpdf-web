<?php

use App\Enums\CommonStatus;
use App\Enums\IsAgreeStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_manage_id')->nullable()->constrained('menu_manages');
            $table->foreignId('page_id')->nullable()->constrained('pages');
            $table->integer('serial')->nullable();
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
        Schema::dropIfExists('footer_menus');
    }
}
