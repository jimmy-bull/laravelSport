<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCommentsTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_comments_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_comment_id');
            $table->bigInteger('comment_id');
            $table->longText('comments');
            $table->bigInteger('who_commented_id');
            $table->foreign('main_comment_id')
                ->references('id')->on('comments')->onDelete('cascade');
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
        Schema::dropIfExists('sub_comments_tables');
    }
}
