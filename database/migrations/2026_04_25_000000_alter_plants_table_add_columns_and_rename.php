<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('plants', function (Blueprint $table) {
            // Add new columns
            $table->double('starting_fund')->nullable()->after('batch_name');
            $table->text('seedling_source')->nullable()->after('starting_fund');
        });

        // Rename column using raw SQL (no additional package needed)
        DB::statement('ALTER TABLE plants CHANGE estimated_count seedling_count INT(11) NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rename column back using raw SQL
        DB::statement('ALTER TABLE plants CHANGE seedling_count estimated_count INT(11) NULL');

        Schema::table('plants', function (Blueprint $table) {
            // Drop added columns
            $table->dropColumn(['starting_fund', 'seedling_source']);
        });
    }
};
