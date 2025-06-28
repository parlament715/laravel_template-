<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected string $tableName = "books";
    public function up(): void
    {
        Schema::create($this->tableName,function (Blueprint $table) {
            $table->id();
            $table->text("title");
            $table->text("author");
            $table->date("published_at");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        dump("Dropping table: " . $this->tableName);
        Schema::dropIfExists($this->tableName);
    }
};
