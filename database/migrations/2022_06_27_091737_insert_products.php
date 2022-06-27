<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('products')->insert(
            array(
                'name' => 'Moletom Cinza',
                'description' => 'Moletom Jordan unisex, cinza',
                'image' => '202206270903moletom.jpeg',
                'preco' => 150,
                'categorie_id' => 2
            )
        );

        \DB::table('products')->insert(
            array(
                'name' => 'Camiseta São Paulo',
                'description' => 'Camiseta 2 São Paulo 2021',
                'image' => '202206270905camiseta.jpeg',
                'preco' => 200,
                'categorie_id' => 4
            )
        );

        \DB::table('products')->insert(
            array(
                'name' => 'Sapato Social',
                'description' => 'Sapato Social preto',
                'image' => '202206270906sapato.jpeg',
                'preco' => 134,
                'categorie_id' => 1
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
