<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('water_bill_units', function (Blueprint $table) {
            $table->id();
            $table->decimal('fixed_charge', 8, 2);
            $table->decimal('per_unit_charge', 8, 2);
            $table->decimal('min_units', 8, 2);
            $table->decimal('max_units', 8, 2)->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('water_bill_units');
    }
};
