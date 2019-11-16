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
            $table->string('name',55);
            $table->string('image')->default('');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('shop_id')->default(0);

            $table->string('shop_id',55);
            $table->string('tel',255)->default('');
            $table->string('email',255)->default('');
            $table->timestamp('email_verified_at')->nullable();
            
            $table->string('admin_id',255)->default('0');

            $table->string('is_delete',2)->default('0');
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
        Schema::dropIfExists('users');
    }
}
