<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('idpersons');
            $table->string('name');
            $table->string('email');
            $table->foreign('address_id')->references('idaddress')->on ('address')->onDelete('set null');  
            $table->unsignedInteger('address_id')->nullable();
            $table->string('avatar');  
            $table->softDeletes();
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
        Schema::dropIfExists('persons');
        Schema::table('persons', function(Blueprint $table)
        {
           $table->dropSoftDeletes();
       });

    }
}
