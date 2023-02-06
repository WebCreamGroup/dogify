<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pets', static function (Blueprint $table) {
            $table->id();

            $table->string('animal')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('breed_id')->nullable()->index();
            $table->string('name');
            $table->date('birth_date')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
