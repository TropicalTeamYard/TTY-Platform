<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpenAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_auth', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->comment('用户id');
            $table->bigInteger('app_id')->comment('应用id');
            $table->string('redirect_token')->comment('无授权token');
            $table->timestamp('redirect_create_at')->comment('无授权token创建时间');
            $table->boolean('redirect_used')->comment('无授权token是否被使用');
            $table->string('login_token')->comment('登录token');
            $table->timestamp('login_create_at')->comment('登录token创建时间');
            $table->boolean('login_used')->comment('登录token是否被创建');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('open_auth');
    }
}
