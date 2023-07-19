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
        Schema::create('tasks_tags', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tasks_id');
            $table->unsignedBigInteger('tag_id');

            $table->timestamps();

            //IDX
            $table->index('tasks_id', 'post_tag_tasks_idx');
            $table->index('tag_id', 'post_tag_tag_idx');

            // FK
            $table->foreign('tasks_id', 'tasks_tag_tasks_fk')->on('tasks')->references('id');
            $table->foreign('tag_id', 'post_tag_tag_fk')->on('tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks_tags');
    }
};
