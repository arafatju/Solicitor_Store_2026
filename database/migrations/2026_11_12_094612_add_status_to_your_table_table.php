<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToYourTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up(): void
{
    Schema::table('productinfo', function (Blueprint $table) {
        $table->string('status', 20)->default('ok11');
    });
}

public function down(): void
{
    Schema::table('productinfo', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}
}
