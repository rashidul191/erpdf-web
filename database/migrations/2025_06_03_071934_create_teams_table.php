<?php

use App\Enums\CommonStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_category_id')->nullable()->constrained('team_categories');
            $table->unsignedTinyInteger('serial')->nullable();
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('designation')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedTinyInteger('status')->nullable()->default(CommonStatus::Active);
            $table->string('fb_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('instagram_link')->nullable();
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
        Schema::dropIfExists('teams');
    }
}
