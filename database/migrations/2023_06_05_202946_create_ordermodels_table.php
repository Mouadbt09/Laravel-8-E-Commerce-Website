<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdermodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordermodels', function (Blueprint $table) {
            $table->id();
            $table->string("f_name");
            $table->string("email");
            $table->string("country");
            $table->string("city");
            $table->string("street_addres");
            $table->string("code_postal");
            $table->string("total_price");
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
        Schema::dropIfExists('ordermodels');
    }
}
