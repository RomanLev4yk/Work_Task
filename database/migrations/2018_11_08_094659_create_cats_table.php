<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cats', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';

            $table->increments('id');
            $table->timestamps();
            $table->string('name', 255)
                ->index()
                ->fillable()
                ->nullable(false);
            $table->integer('age')
                ->index()
                ->nullable(false);
            $table->integer('weight')
                ->nullable(false);
            $table->integer('amount_of_legs')
                ->index()
                ->nullable(false);    

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cats');
    }
}
