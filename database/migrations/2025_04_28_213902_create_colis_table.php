<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColisTable extends Migration
{
    public function up()
    {
        Schema::create('colis', function (Blueprint $table) {
            $table->id();
            $table->string('numero_colis')->unique();
            $table->string('client');
            $table->string('destination');
            $table->date('date_envoi');
            $table->enum('statut', ['En livraison', 'En transit', 'Retardé'])->default('En transit');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('colis');
    }
}
