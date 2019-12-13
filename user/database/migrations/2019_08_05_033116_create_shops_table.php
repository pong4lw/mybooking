<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('open',255)->default('');
            $table->string('close',255)->default('');
              $table->unsignedBigInteger('shop_id')->default(0);

            $table->string('week',7)->default('');
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
        Schema::dropIfExists('shops');
    }
}
