<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('userid');  
            $table->string('trid');  
            $table->string('status');  
            $table->string('prcode');  
            $table->integer('number'); 
            $table->string('month');  
            $table->string('year');  
            $table->string('status2', 255)->nullable();
            $table->timestamps(); // Created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
