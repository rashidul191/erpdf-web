<?php

use App\Enums\CommonStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_category_id')
                ->nullable()
                ->constrained('document_categories')
                ->nullOnDelete();
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->string('file')->nullable();
            $table->integer('serial')->nullable();
            $table->unsignedTinyInteger('status')->nullable()->default(CommonStatus::Active());
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
        Schema::dropIfExists('documents');
    }
}
