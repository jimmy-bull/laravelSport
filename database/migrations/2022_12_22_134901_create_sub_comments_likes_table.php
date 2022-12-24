<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCommentsLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_comments_likes', function (Blueprint $table) {
            $table->id();
            $table->integer("who_liked_id");
            $table->unsignedBigInteger("main_comment_id");
            $table->foreign('main_comment_id')
                ->references('main_comment_id')->on('sub_comments_tables')->onDelete('cascade');
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
        Schema::dropIfExists('sub_comments_likes');
    }
}
