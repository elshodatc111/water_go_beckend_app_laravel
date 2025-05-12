<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('company_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->string('lat_max')->nullable();
            $table->string('lat_man')->nullable();
            $table->string('lang_max')->nullable();
            $table->string('lang_man')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('company_locations');
    }
};
