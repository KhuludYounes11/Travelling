<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->string('comment');
            $table->integer('star');
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('hotel_id')->unsigned();
            $table->foreign('customer_id')->on('customers')->references('id')->onDelete('cascade');
            $table->foreign('hotel_id')->on('hotels')->references('id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
};
