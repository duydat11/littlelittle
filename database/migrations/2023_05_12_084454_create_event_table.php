<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event', function (Blueprint $table) {
            $table->Increments('event_id');
            $table->string('event_name');
            $table->string('event_slug');
            $table->string('event_desc');
            $table->longText('event_content');
            $table->string('event_img');
            $table->double('ticket_price', 10, 3);
            $table->date('date_start');
            $table->date('date_end');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event');
    }
};
