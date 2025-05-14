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
        Schema::create('user_stories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id'); // ID du projet associé
            $table->string('titre'); // Titre de l'histoire utilisateur
            $table->text('en_tant_que'); // En tant que...
            $table->text('je_veux'); // Je veux...
            $table->text('afin_de'); // Afin de...
            $table->timestamps(); // Horodatage de la création et de la mise à jour
        });
        Schema::table('user_stories', function (Blueprint $table) {
            $table->unsignedBigInteger('sprint_id')->nullable()->after('id');
            $table->foreign('sprint_id')->references('id')->on('sprints')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_stories');
    }
};
