<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_datas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();            
            $table->bigInteger('client_id')->nullable();     // legatura cu clientul       
            $table->bigInteger('country_id')->nullable();     // legatura cu clientul       
            $table->bigInteger('city_id')->nullable();     // legatura cu clientul       
            $table->bigInteger('email_id')->nullable();     // legatura cu clientul       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_datas');
    }
}
