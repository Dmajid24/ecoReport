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
    Schema::table('reports', function (Blueprint $table) {
        $table->timestamp('processed_at')->nullable()->after('status');
        $table->timestamp('done_at')->nullable()->after('processed_at');
    });
}

public function down(): void
{
    Schema::table('reports', function (Blueprint $table) {
        $table->dropColumn(['processed_at', 'done_at']);
    });
}
};
