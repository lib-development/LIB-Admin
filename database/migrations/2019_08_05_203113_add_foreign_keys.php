<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog_content', function (Blueprint $table) {
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('author_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('blog_content', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['author_id']);
        });
        Schema::enableForeignKeyConstraints();
    }
}
