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
        DB::statement($this->dropView());
        DB::statement($this->createView());
    }

    public function down(): void
    {
        DB::statement($this->dropView());
    }

    private function createView(): string
    {
        return <<<'SQL'
            CREATE VIEW vw_tracking_time AS
                SELECT
                    tt.id,
                    tk.name as task,
                    pj.name as project,
                    tt.date,
                    tt.duration_minutes,
                    tt.user_id
                FROM tracking_time tt
                LEFT JOIN tasks tk ON tk.id = tt.task_id
                LEFT JOIN projects pj ON pj.id = tk.project_id
                WHERE tt.deleted_at IS NULL;
            SQL;
    }

    private function dropView(): string
    {
        return <<<'SQL'
            DROP VIEW IF EXISTS `vw_tracking_time`;
            SQL;
    }
};
