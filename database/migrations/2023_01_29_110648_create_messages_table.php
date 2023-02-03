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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('sender_id')->nullable();
            $table->index('sender_id', 'user_message_sender_idx');
            $table->foreign('sender_id', 'user_message_sender_fk')
                ->on('users')->references('id');

            $table->unsignedBigInteger('receiver_id')->nullable();
            $table->index('receiver_id', 'user_message_receiver_idx');
            $table->foreign('receiver_id', 'user_message_receiver_fk')
            ->on('users')->references('id');

            $table->string('theme')->default('none');
            $table->text('text');

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
        Schema::dropIfExists('messages');
    }
};
