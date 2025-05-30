<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->integer('star')->default(5);
            $table->integer('star_count')->default(0);
            $table->enum('status', ['pending', 'true', 'delete'])->default('pending');
            $table->integer('price')->default(0);
            $table->integer('balans')->default(0);
            $table->integer('order_price')->default(0);
            $table->string('icon_url')->nullable();
            $table->string('banner_url')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('companies');
    }
};
