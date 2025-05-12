<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('company_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('lang')->nullable();
            $table->string('latude')->nullable();
            $table->string('addres')->nullable();
            $table->integer('price')->default(0);
            $table->enum('status', ['pending', 'cancel', 'succes'])->default('pending');
            $table->integer('star')->default(5);
            $table->text('comment')->nullable();
            $table->foreignId('currer_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
    
    public function down(): void{
        Schema::dropIfExists('company_orders');
    }
};
