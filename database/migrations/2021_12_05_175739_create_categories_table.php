<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 対象の存在をしていれば、処理を中断する
        if(Schema::hasTable('categories')){
            return;
        }
        // 対象のテーブルを作成する
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name' , 5)->nullable();
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
        Schema::dropIfExists('categories');
    }
}
