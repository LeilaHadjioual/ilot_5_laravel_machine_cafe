<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('boisson_id')
                ->index('boisson_id')
                ->foreign('boisson_id')
                ->references('id')
                ->on('boissons');
            $table->integer('ingredient_id')
                ->index('ingredient_id')
                ->foreign('ingredient_id')
                ->references('id')
                ->on('ingredients');
            $table->integer('quantity');
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
        Schema::dropIfExists('Recipes');
    }
}
