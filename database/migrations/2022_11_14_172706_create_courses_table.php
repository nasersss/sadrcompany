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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diploma_id')->default(1);
            $table->foreign('diploma_id')->references('id')->on('diplomas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('title_en');
            $table->longText('description');
            $table->text('img_url');
            $table->text('intro_video_url');
            $table->text('appendix_url');
            $table->double('local_price');
            $table->double('global_price');
            $table->integer('hours_number');
            $table->unsignedBigInteger('trainer_info_id');
            $table->foreign('trainer_info_id')->references('id')->on('trainer_infos')->onUpdate('cascade')->onDelete('cascade');
            $table->smallInteger('is_active')->default(-1);
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
        Schema::dropIfExists('courses');
    }
};
