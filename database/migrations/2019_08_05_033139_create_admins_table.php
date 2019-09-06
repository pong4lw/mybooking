<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',255);
            $table->string('image',255)->default('');
            $table->string('tel',255);
            $table->string('address',255);
            $table->unsignedBigInteger('shop_id')->default(0);
            $table->string('email',255);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',255);
            $table->enum('user_type', ['client','admin','staff','staff2'])->default('staff');
            $table->string('admin_id',255)->default('0');
            $table->string('is_delete',2)->default('0');

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
        Schema::dropIfExists('admins');
    }
}
