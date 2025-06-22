<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::table('backlog_user', function (Blueprint $table) {
        $table->enum('status', ['en cours', 'terminé', 'bloqué'])->default('en cours');
    });
}

public function down(): void
{
    Schema::table('backlog_user', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}

};
