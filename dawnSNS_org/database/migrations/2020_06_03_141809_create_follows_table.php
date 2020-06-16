<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->integer('follow_id')->comment('フォローされているユーザーID');
            $table->integer('follower_id')->comment('フォローしているユーザーID');
            $table->timestamp('created_at')->useCurrent();
            
            $table->index('follow_id');
            $table->index('follower_id');
            
            //uniqueを登録する事で以下のキーの組み合わせで同じIDの登録を防ぐことができる
            $table->unique([
                'follow_id',
                'follower_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
}
