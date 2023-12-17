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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('total_loan'); // jumlah pinjaman
            $table->foreignId('interest_id')->constrained('cooperative_interests'); // bunga id
            $table->string('total_interest'); // total bunga
            $table->integer('long_installment'); // lama cicilan
            $table->string('total_installment'); // besar angsuran
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
