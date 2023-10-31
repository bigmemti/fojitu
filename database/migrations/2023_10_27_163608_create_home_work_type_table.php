<?php

use App\Models\HomeWork;
use App\Models\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_work_type', function (Blueprint $table) {
            $table->foreignIdFor(HomeWork::class)->constrained();
            $table->foreignIdFor(Type::class)->constrained();
            $table->timestamps();

            $table->unique(['home_work_id','type_id'], 'HWTI');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_work_type');
    }
};
