<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('codepress_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable(true)->unsigned();
            $table->foreign('parent_id')->references('id')->on('codepress_codecategories');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->boolean('active')->default('false');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('codepress_categories');
    }
}