<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ajouter la colonne created_by à la table projects.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->nullable()->after('name'); // ➕ ajoute colonne
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade'); // 🔗 relation avec users
        });
    }

    /**
     * Supprimer la colonne created_by si on fait un rollback.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['created_by']); // ❌ enlève relation
            $table->dropColumn('created_by');     // ❌ enlève colonne
        });
    }
};
