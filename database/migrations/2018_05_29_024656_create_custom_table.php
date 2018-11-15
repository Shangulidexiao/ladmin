<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userName')->default('')->comment('登录名');
            $table->string('trueName')->default('')->comment('姓名');
            $table->string('nickName')->default('')->comment('昵称');
            $table->string('email')->default('')->comment('邮箱号');
            $table->string('password')->default('')->comment('密码');
            $table->string('customId')->default('')->comment('等客编号');
            $table->integer('level')->default(0)->comment('等级');
            $table->integer('adminId')->default(0)->comment('操作人');
            $table->softDeletes();
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
        Schema::dropIfExists('desgin_custom');
    }
}
