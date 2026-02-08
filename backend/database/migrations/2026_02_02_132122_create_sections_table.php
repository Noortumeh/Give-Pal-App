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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('sections')->onDelete('cascade');
            $table->string('section');
            $table->string('type');
            $table->string('file_path')->nullable();
            $table->string('file_type')->nullable();
            $table->integer('order')->default(1);
            $table->integer('items_count')->nullable()->default(3);
            
            $table->softDeletes();
            $table->boolean('active')->default(true);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
