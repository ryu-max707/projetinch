<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('colis', function (Blueprint $table) {
        $table->timestamp('date_statut')->nullable()->after('statut');
    });
}

public function down()
{
    Schema::table('colis', function (Blueprint $table) {
        $table->dropColumn('date_statut');
    });
}
};
