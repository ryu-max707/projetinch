<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() { Schema::create('livraisons', function (Blueprint $table) { 
        $table->id(); 
        $table->string('numero_colis')->unique();
        $table->string('livreur');
        $table->string('colis');
        $table->string('destination');
        $table->date('date_livraison');
        $table->time('heure_livraison');
        $table->string('telephone'); 
        $table->enum('statut', ['En cours', 'En attente', 'Terminé'])->default('En attente');
        $table->text('detail_livraison')->nullable();
        $table->timestamps(); }); }
    public function down(): void
    {
        Schema::dropIfExists('livraisons'); 
    }
};