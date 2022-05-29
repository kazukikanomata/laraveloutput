<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 対象の存在をしていれば、処理を中断する
        if(Schema::hasTable('tasks')){
            return;
        }
        // 対象のテーブルを作成する
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->dateTime('due_time');
            $table->integer('time');
            $table->string('content' , 200);
            $table->string('status');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
        $table->dropSoftDeletes();
        });
        Schema::dropIfExists('tasks');
    }
}
