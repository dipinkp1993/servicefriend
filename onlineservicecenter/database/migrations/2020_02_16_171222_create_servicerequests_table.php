<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicerequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicerequests', function (Blueprint $table) {
            $table->bigIncrements('rid');
            $table->integer('customerid');
            $table->integer('serviceid');
            $table->string('catname');
            $table->string('vname');
            $table->string('vmodel');
            $table->string('vbrand');
            $table->date('sdate');
            $table->time('stime');
            $table->string('request_status');
            $table->string('request_type');
            $table->string('service_charge');

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
        Schema::dropIfExists('servicerequests');
    }
}
