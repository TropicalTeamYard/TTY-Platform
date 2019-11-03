<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique()->comment('应用名称');
            $table->string('uid')->unique()->comment('唯一标识符');
            $table->string('display_name')->comment('显示名称');
            $table->boolean('third')->comment('是否第三方');
            $table->string('entrance_url')->comment('入口url');
            $table->string('secret')->comment('密钥');
            $table->string('support_platform')->comment('支持的平台');
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
        Schema::dropIfExists('app');
    }
}
