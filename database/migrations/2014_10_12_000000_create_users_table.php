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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->integer('user_type_id');
            $table->boolean('active');
            $table->integer('chat_id');
            $table->string('email_verify_code');
            $table->boolean('email_verify_status');
            $table->string('password', 60);
            $table->string('profile_pic');
            $table->string('gender');
            $table->string('alias', 100);
            $table->boolean('alias_change');
            $table->string('address');
            $table->string('city');
            $table->string('zipcode');
            $table->string('state');
            $table->string('country_code');
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
