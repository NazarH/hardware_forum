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
        Schema::create('topic_messages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('theme_id')->nullable();
            $table->index('theme_id', 'theme_topic_message_theme_idx');
            $table->foreign('theme_id', 'theme_topic_message_theme_fk')
                ->on('themes')->references('id');

            $table->unsignedBigInteger('topic_id')->nullable();
            $table->index('topic_id', 'topic_topic_message_topic_idx');
            $table->foreign('topic_id', 'topic_topic_message_topic_fk')
                ->on('topics')->references('id');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('user_id', 'user_topic_message_user_idx');
            $table->foreign('user_id', 'user_topic_message_user_fk')
                ->on('users')->references('id');

            $table->text('message');

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
        Schema::dropIfExists('topic_messages');
    }
};
