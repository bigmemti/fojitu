<?php

use App\Models\Session;
use App\Models\Member;
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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Member::class)->constrained();
            $table->foreignIdFor(Session::class)->constrained();
            $table->unsignedTinyInteger('status');
            $table->timestamps();

            $table->unique(['member_id','session_id'], 'MSI');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
