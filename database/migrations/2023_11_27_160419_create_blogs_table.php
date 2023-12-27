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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            // $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('image');
            $table->string('image_sm')->nullable();
            $table->string('image_thumbnail')->nullable();
            $table->string('image_alt')->nullable();
            $table->text('title');
            $table->text('slug');
            $table->longText('description');
            $table->longText('details');
            $table->string('status');
            $table->longText('keyword')->nullable();
            $table->longText('head_script')->nullable();
            $table->longText('body_script')->nullable();
            $table->longText('custom_html')->nullable();
            $table->longText('custom_css')->nullable();
            $table->longText('custom_js')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
