<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('boisson_id')
                ->index('boisson_id')
                ->foreign('boisson_id')
                ->references('id')
                ->on('boisson');
            $table->integer('user_id')
                ->index('user_id')
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->nullable()
                ->default(null);
            $table->integer('sugar')->unsigned();
            $table->string('boisson_name', 250)->nullable($value = true);
            $table->integer('price')->unsigned();
            $table->integer('money_user');
            $table->integer('make_money');
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
        Schema::table('Sales', function (Blueprint $table) {
            //
        });
    }
}
