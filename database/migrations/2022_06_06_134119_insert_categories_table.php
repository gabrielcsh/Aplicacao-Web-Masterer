<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('categories')->insert(
            array(
                'name' => 'SAPATOS'
            )
        );

        \DB::table('categories')->insert(
            array(
                'name' => 'MOLETONS'
            )
        );

        \DB::table('categories')->insert(
            array(
                'name' => 'CALÇAS'
            )
        );

        \DB::table('categories')->insert(
            array(
                'name' => 'REGATAS'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
