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
    Schema::create('projets', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description')->nullable();
        $table->date('start_date')->nullable();
        $table->date('end_date')->nullable();
        $table->string('scrum_master');
        $table->enum('priority', ['haute', 'moyenne', 'basse'])->default('moyenne');
        $table->string('project_type')->nullable();
        $table->text('main_goals')->nullable();
        $table->timestamps(); // ajoute created_at et updated_at
    });
}
};
