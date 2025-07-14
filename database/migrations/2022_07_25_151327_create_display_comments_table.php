<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('display_comments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title_ar');
            $table->string('title_en')->nullable();
            $table->string('comment_ar');
            $table->string('comment_en')->nullable();
            $table->smallInteger('star')->nullable()->default(1);
            $table->smallInteger('is_active')->nullable()->default(1);
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
        Schema::dropIfExists('display_comments');
    }
};
