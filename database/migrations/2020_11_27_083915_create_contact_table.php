<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->increments('idcontact');
            $table->foreign('persons_id')->references('idpersons')->on ('persons')->onDelete('set null');  
            $table->unsignedInteger('persons_id')->nullable();   
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact');
        Schema::table('contact', function(Blueprint $table)
         {
            $table->dropSoftDeletes();
        });

    }
}
