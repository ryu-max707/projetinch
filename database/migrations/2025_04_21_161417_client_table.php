<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     
    public function up() { Schema::create('clients', function (Blueprint $table) { 
        $table->id(); 
        $table->string('name'); 
        $table->string('email')->unique()->nullable(); 
        $table->enum('type', ['Particulier', 'Professionnel', 'Premium'])->default('Particulier');
        $table->string('zone');
        $table->string('telephone');
        $table->integer('colis'); 
        $table->enum('statut', ['Actif', 'Inactif'])->default('Actif'); 
        $table->timestamps(); }); }
    public function down(): void
    {
        Schema::dropIfExists('clients'); 
    }
};
