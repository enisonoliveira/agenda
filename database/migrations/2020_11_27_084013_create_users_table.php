<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('idusers');
            $table->string('email')->nullable();
            $table->foreign('persons_id')->references('idpersons')->on ('persons')->onDelete('set null');  
            $table->unsignedInteger('persons_id')->nullable();   
            $table->string('password');
            $table->string('ip');
            $table->string('crfs_token',3000);
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
        Schema::table('users', function(Blueprint $table)
        {
           $table->dropSoftDeletes();
       });
    }
}
