<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create method takes two parameters:
        // the name of the table, and
        // the function which will create the table itself
        // that function takes Blueprint $table as its parameter
        
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->String('title');
            $table->String('content');
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
        Schema::dropIfExists('messages');
    }
}
