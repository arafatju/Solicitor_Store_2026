<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLotnumberToTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up(): void
{
    Schema::table('transaction', function (Blueprint $table) {
        $table->string('lotnumber')->nullable();
    });
}

public function down(): void
{
    Schema::table('transaction', function (Blueprint $table) {
        $table->dropColumn('lotnumber');
    });
}
}
