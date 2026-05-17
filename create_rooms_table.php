<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number')->unique();
            $table->string('type'); // standard, luxury, king
            $table->decimal('price_per_night', 8, 2);
            $table->string('status')->default('available');
            $table->timestamps();
        });
    }
};
