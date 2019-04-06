<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bill_id');
            $table->timestamps();
        });
        Schema::table('purchases', function (Blueprint $table) {
            $table->biginteger('user_id')->unsigned();
            $table->biginteger('product_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchases', function (Blueprint $table) { 
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
        });
        Schema::dropIfExists('purchases');
    }
}
