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
        Schema::create('wire_tables', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name');
            $table->string('acct_name');
            $table->integer('acct_number');
            $table->string('Swift_code');
            $table->string('iban');
            $table->decimal('amount_euro');
            $table->decimal('amount_pounds');
            $table->string('description');
            $table->string('invoice');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wire_tables');
    }
};
