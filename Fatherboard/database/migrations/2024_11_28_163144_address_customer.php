<?php

use App\Models\CustomerInformation;
use App\Models\AddressInformation;
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
        Schema::create("address_customer", function(Blueprint $table)
        {
            $table->id();
            $table->foreignIdFor(AddressInformation::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(CustomerInformation::class)->constrained()->cascadeOnDelete();
            $table->boolean("default")->default(false);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
