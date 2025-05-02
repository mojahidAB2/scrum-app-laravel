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
        Schema::create('backlogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id'); // ID du projet associé
            $table->string('titre'); // Titre de la tâche
            $table->text('description')->nullable(); // Description de la tâche
            $table->enum('priorite', ['haute', 'moyenne', 'faible'])->default('moyenne'); // Priorité de la tâche
            $table->string('statut')->default('à faire'); // Statut de la tâche (à faire, en cours, terminé)
            $table->date('date_echeance')->nullable(); // Date d'échéance de la tâche
            $table->timestamps(); // Horodatage de la création et de la mise à jour
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backlogs');
    }
};
