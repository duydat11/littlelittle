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
        Schema::create('tbl_datve', function (Blueprint $table) {
            $table->Increments('order_id');
            $table->string('order_customer_name');
            $table->double('order_customer_phone');
            $table->string('order_customer_address');
            $table->integer('order_quantity');
            $table->date('order_date_use');
            $table->integer('ticket_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_datve');
    }
};
