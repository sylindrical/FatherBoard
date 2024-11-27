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
        Schema::create('address_information', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("Country");
            $table->string("Address Line");
            $table->string("City");
            $table->char("PostCode",10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address_information');
    }
};
