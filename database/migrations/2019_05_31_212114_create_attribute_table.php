<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute', function (Blueprint $table) {
            $table->increments('id');          
            $table->bigInteger('cat_id');
            $table->string('attr_name');
            $table->tinyInteger('attr_index')->default(0)->comment('能否进行检索 0不需要检索1关键字检索2范围检索');
            $table->tinyInteger('attr_type')->default(0)->comment('属性可选 0唯一属性1单选属性2复选属性');
            $table->tinyInteger('attr_input_type')->default(0)->comment('输入方式 0手工输入1从下面列表中选择');
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
        Schema::dropIfExists('attribute');
    }
}
