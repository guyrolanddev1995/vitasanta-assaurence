<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculeSouscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicule_souscriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('num_sousc');
            $table->date('date_sousc');
            $table->string('immatriculation');
            $table->string('montant');
            $table->string('mode_paiement');
            $table->string('ref_paiement')->nullable();
            $table->string('code_encaisseur')->nullable();
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
        Schema::dropIfExists('vehicule_souscriptions');
    }
}
