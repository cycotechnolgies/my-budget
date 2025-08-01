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
        Schema::create('Payments', function (Blueprint $table) {
            $table->id();
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->foreign('work_id')->references('id')->on('worklogs')->constrained()->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->date('Rec_date');
            $table->text('notes')->nullable();
            $table->timestamps();                                                                                       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Payments');
    }
};
