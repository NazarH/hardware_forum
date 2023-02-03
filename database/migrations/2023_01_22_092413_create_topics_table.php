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
        Schema::create('topics', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('theme_id')->nullable();
            $table->index('theme_id', 'theme_topic_theme_idx');
            $table->foreign('theme_id', 'theme_topic_theme_fk')
                ->on('themes')->references('id');

            $table->string('topic_name');
            $table->string('user_name');
            $table->integer('answers')->default(0);
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
        Schema::dropIfExists('topics');
    }
};
