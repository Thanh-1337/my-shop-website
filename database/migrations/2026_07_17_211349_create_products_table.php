<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->bigInteger('price');

        // Tạo khóa ngoại liên kết tới bảng categories
        $table->foreignId('category_id')->constrained()->onDelete('cascade');

        $table->string('image');
        $table->decimal('rating', 2, 1);
        $table->integer('reviews');
        $table->text('desc');
        $table->json('specs');
        $table->timestamps();
    });
}
};
