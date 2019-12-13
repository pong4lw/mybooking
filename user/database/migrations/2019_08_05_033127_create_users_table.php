<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',55);
            $table->string('image')->default('');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('shop_id')->default(0);
            $table->string('address',255)->default('');
            $table->string('tel',255)->default('');
            $table->string('tel2',255)->default('');
            $table->string('email',255)->default('');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('user_type', ['client'])->default('client');
            $table->string('admin_id',255)->default('0');
            $table->string('is_delete',2)->default('0');
            $table->string('is_receive',2)->default('0');
            $table->rememberToken();
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
