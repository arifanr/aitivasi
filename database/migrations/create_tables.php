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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement()->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('role')->default('user');
            $table->string('avatar')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->string('created_by')->default('system');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate()->nullable();
            $table->string('updated_by')->default('system')->nullable();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->id()->autoIncrement()->primary();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->string('created_by')->default('system');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate()->nullable();
            $table->string('updated_by')->default('system')->nullable();
        });

        Schema::create('portfolios', function (Blueprint $table) {
            $table->id()->autoIncrement()->primary();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('image');
            $table->string('link')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->string('created_by')->default('system');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate()->nullable();
            $table->string('updated_by')->default('system')->nullable();
        });

        Schema::create('blogs', function (Blueprint $table) {
            $table->id()->autoIncrement()->primary();
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->string('created_by')->default('system');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate()->nullable();
            $table->string('updated_by')->default('system')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('services');
        Schema::dropIfExists('portfolios');
        Schema::dropIfExists('blogs');
    }
};
