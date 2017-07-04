<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserApiKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_api_keys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('api_key')->index();
            $table->boolean('account')->default(0)->index();
            $table->boolean('builds')->default(0)->index();
            $table->boolean('characters')->default(0)->index();
            $table->boolean('guilds')->default(0)->index();
            $table->boolean('inventories')->default(0)->index();
            $table->boolean('progression')->default(0)->index();
            $table->boolean('pvp')->default(0)->index();
            $table->boolean('tradingpost')->default(0)->index();
            $table->boolean('unlocks')->default(0)->index();
            $table->boolean('wallet')->default(0)->index();
            $table->timeStamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_api_keys');
    }
}
