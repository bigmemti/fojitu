<?php

use App\Models\Major;
use App\Models\University;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('curricula', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(University::class)->constrained();
            $table->foreignIdFor(Major::class)->constrained();
            $table->timestamps();

            $table->unique(['university_id','major_id'], 'UMI');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curricula');
    }
};
