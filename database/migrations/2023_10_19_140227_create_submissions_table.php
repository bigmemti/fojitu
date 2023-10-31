<?php

use App\Models\HomeWork;
use App\Models\Member;
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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(HomeWork::class)->constrained();
            $table->foreignIdFor(Member::class)->constrained();
            $table->text('answer')->nullable();
            $table->double('score',5,2,true)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['home_work_id','member_id'], 'HWMI');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
