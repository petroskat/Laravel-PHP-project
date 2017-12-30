<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceCategRegionToAdvs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('advs',function($table){
        $table->integer('price');
        $table->string('category');
        $table->string('region');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('advs',function($table){
        $table->dropColumn('price');
        $table->dropColumn('category');
        $table->dropColumn('region');
      });
    }
}
