<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderAppointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_appoints', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('appoints_day',255);
            $table->unsignedBigInteger('shop_id')->default(0);
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('open_time');
            $table->unsignedBigInteger('close_time');
            $table->unsignedBigInteger('service_id');
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
        Schema::dropIfExists('provider_appoints');
    }
}
