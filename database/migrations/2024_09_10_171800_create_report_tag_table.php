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
        Schema::create('report_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('report_id');
            $table->unsignedBigInteger('tag_id');
            $table->boolean('delete_flag')->default(false);
            $table->timestamps();

            $table->primary(['report_id', 'tag_id']);
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_tag');
    }
};
