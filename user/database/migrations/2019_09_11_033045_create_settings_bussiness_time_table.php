<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsBussinessTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings_bussiness_time', function (Blueprint $table) {
          $table->bigIncrements('id') ;            
          $table->unsignedBigInteger('shop_id');
          $table->string('name',255)->default('');
          $table->string('start',255)->default('');
          $table->string('end',255)->default('');
          $table->string('is_delete',255)->default('');
          $table->date('used_at');
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
        Schema::dropIfExists('settings_bussiness_time');
    }
}
