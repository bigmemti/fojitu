<?php

use App\Models\Curriculum;
use App\Models\User;
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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->unique()->constrained();
            $table->foreignIdFor(Curriculum::class)->constrained();
            $table->unsignedBigInteger('student_id');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['curriculum_id','student_id'],'CSI');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
