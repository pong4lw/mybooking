<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',255);
            $table->unsignedBigInteger('space_id')->default(1); 
            $table->unsignedBigInteger('shop_id')->default(0);
            $table->string('value',255)->default('');          
            $table->unsignedBigInteger('used_time')->default(0);
            $table->text('description')->nullable();
            $table->string('image',255)->default('');
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
        Schema::dropIfExists('services');
    }
}
