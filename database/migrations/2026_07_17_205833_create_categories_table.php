<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('slug')->unique(); // Dùng để lọc (ví dụ: keyboard, audio)
        $table->string('name');          // Tên hiển thị (ví dụ: Bàn phím & Chuột)
        $table->timestamps();
    });
}
};

