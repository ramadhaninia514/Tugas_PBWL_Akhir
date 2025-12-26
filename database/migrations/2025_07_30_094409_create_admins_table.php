<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // opsional, jika ingin menampilkan nama admin
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken(); // untuk fitur remember me jika dibutuhkan
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
