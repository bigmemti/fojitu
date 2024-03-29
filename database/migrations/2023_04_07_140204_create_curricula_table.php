<?php

use App\Models\Major;
use App\Models\Institution;
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
            $table->foreignIdFor(Institution::class)->constrained();
            $table->foreignIdFor(Major::class)->constrained();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['institution_id','major_id'], 'UMI');
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
