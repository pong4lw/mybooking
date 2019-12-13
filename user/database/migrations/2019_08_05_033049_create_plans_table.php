<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',255);
            $table->unsignedBigInteger('space_id');
            $table->unsignedBigInteger('services_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('is_open')->default('0');
            $table->unsignedBigInteger('is_delete')->default('0');
            $table->unsignedBigInteger('shop_id')->default('0');
            $table->string('used_at',50);
            $table->string('used_time',50);
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
        Schema::dropIfExists('plans');
    }
}
