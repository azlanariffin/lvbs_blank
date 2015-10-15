<?php

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('user_type_id');
            $table->boolen('active');
            $table->integer('chat_id');
            $table->string('email_verify_code');
            $table->boolen('email_verify_status');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('alias', 100);
            $table->boolen('alias_change');
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
        Schema::drop('users');
    }
}
