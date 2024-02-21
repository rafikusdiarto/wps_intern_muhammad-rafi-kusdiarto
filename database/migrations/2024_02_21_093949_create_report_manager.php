<?php

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
        Schema::create('report_managers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manager_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('report');
            $table->string('file_report')->nullable();
            $table->enum('status', ['PENDING', 'DISETUJUI', 'DITOLAK']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_managers');
    }
};
