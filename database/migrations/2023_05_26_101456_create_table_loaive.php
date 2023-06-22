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
        Schema::create('tbl_loaive', function (Blueprint $table) {
            $table->Increments('ticket_id');
            $table->string('ticket_desc');
            $table->double('ticket_single_price');
            $table->integer('ticket_remain');
            $table->integer('ticket_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_loaive');
    }
};
