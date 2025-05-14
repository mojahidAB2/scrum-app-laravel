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
        Schema::table('backlogs', function (Blueprint $table) {
    $table->unsignedBigInteger('user_story_id')->nullable()->after('project_id');
    $table->foreign('user_story_id')->references('id')->on('user_stories')->onDelete('set null');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('backlogs', function (Blueprint $table) {
    $table->dropForeign(['user_story_id']);
    $table->dropColumn('user_story_id');
});

    }
};
