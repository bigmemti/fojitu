<?php

use App\Models\User;
use App\Models\Organization;
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
        Schema::create('box_organization', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->unique()->constrained();
            $table->foreignIdFor(Organization::class)->unique()->constrained();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('box_orgatiozation');
    }
};
