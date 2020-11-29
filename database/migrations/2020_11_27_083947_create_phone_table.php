<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone', function (Blueprint $table) {
            $table->increments('idphone');
            $table->string('number');
            $table->foreign('contact_id')->references('idcontact')->on ('contact')->onDelete('set null');  
            $table->unsignedInteger('contact_id')->nullable();   
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
        Schema::dropIfExists('phone');
        Schema::table('phone', function(Blueprint $table)
        {
           $table->dropSoftDeletes();
       });
    }
}
