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
        Schema::create('facility_table', function (Blueprint $table) {
            $table->foreignId("table_id")->constrained("tables","id");
            $table->foreignId("facility_id")->constrained("facilities","id");
            $table->primary(['table_id', 'facility_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_table');
    }
};
