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
            // Check if columns don't exist before adding them
            if (!Schema::hasColumn('tasks', 'progress')) {
                $table->integer('progress')->default(0);
            }
            if (!Schema::hasColumn('tasks', 'completed')) {
                $table->integer('completed')->default(0);
            }
            if (!Schema::hasColumn('tasks', 'total')) {
                $table->integer('total')->default(1);
            }
            if (!Schema::hasColumn('tasks', 'avatar')) {
                $table->string('avatar')->nullable();
            }
            if (!Schema::hasColumn('tasks', 'user_id')) {
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn(['progress', 'completed', 'total', 'avatar']);
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
