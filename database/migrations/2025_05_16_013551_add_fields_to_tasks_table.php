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
        Schema::table('tasks', function (Blueprint $table) {
            // فقط إلا ما كانوش موجودين أصلاً
            if (!Schema::hasColumn('tasks', 'sprint_id')) {
                $table->foreignId('sprint_id')->nullable()->constrained()->onDelete('cascade');
            }

            if (!Schema::hasColumn('tasks', 'backlog_id')) {
                $table->foreignId('backlog_id')->nullable()->constrained()->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['sprint_id']);
            $table->dropColumn('sprint_id');

            $table->dropForeign(['backlog_id']);
            $table->dropColumn('backlog_id');
        });
    }
};
