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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title", 512);
            $table->text("content");
            $table->unsignedBigInteger("author");
            $table->unsignedBigInteger("category");
            $table->integer("likes");
            $table->integer("views");
            $table->boolean("isPublished")->default(false);
            $table->timestamps();

            $table->foreign("category")->references("id")->on("categories")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("author")->references("id")->on("users")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
