<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_service', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('app_id')->comment('应用id');
            $table->boolean('default')->comment('是否是默认service');
            $table->string('name')->comment('服务的名称');
            $table->string('description')->comment('服务描述');
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
        Schema::dropIfExists('app_service');
    }
}
