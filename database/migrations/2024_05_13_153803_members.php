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

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('team_members')->nullable();
            $table->date('date')->nullable();
            $table->boolean('active')->default(true);
            $table->unsignedInteger('layout')->default(0);
            $table->timestamps();
        });

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->date('date_start');
            $table->date('date_end');
            $table->unsignedInteger('layout')->default(0);
            $table->timestamps();
        });

        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->date('date');
            $table->string('author');
            $table->unsignedInteger('layout')->default(0);
            $table->timestamps();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('author');
            $table->longText('description');
            $table->unsignedInteger('type');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->unsignedBigInteger('event_id')->nullable();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->unsignedBigInteger('news_id')->nullable();
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
        Schema::dropIfExists('news');
        Schema::dropIfExists('images');
        Schema::dropIfExists('projects');
    }
};
