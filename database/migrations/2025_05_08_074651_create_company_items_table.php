<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('company_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->string('hajm');
            $table->decimal('price', 10, 2);
            $table->string('icon_url')->nullable();
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void{
        Schema::dropIfExists('company_items');
    }
};
