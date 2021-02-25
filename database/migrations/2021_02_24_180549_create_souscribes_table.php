<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSouscribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('souscribes', function (Blueprint $table) {
            $table->id();
            $table->string("num_sousc");
            $table->string("date_sousc");
            $table->string('nom');
            $table->string('phone');
            $table->string('heure_sousc');
            $table->string('mont_sousc');
            $table->unsignedBigInteger('ville_depart');
            $table->unsignedBigInteger('ville_arrive');
            $table->unsignedBigInteger('transporteur_id');
            $table->string('mode_paiement');
            $table->string('ref_paiement')->nullable();
            $table->string('code_agent')->nullable();
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
        Schema::dropIfExists('souscribes');
    }
}
