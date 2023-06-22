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
        Schema::create('tbl_lienhe', function (Blueprint $table) {
            $table->Increments('contact_id');
            $table->string('contact_name');
            $table->string('contact_email');
            $table->double('contact_phone');
            $table->string('contact_address');
            $table->longText('contact_msg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_lienhe');
    }
};
