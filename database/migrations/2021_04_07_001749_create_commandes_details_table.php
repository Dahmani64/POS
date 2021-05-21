<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('commandes_details', function (Blueprint $table) {
            $table->id();

            $table->integer('quantite');

            $table->unsignedBigInteger('commande_id');    
            $table->foreign('commande_id')
            ->references('id')
            ->on('commandes')
            ->onDelete('restrict')
            ->onUpdate('restrict');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
            ->references('id')
            ->on('products')
            ->onDelete('restrict')
            ->onUpdate('restrict');

           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
