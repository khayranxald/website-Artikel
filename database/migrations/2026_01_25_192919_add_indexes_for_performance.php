<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Indexes already exist in previous migration, just verify
            if (!$this->hasIndex('posts', 'posts_slug_index')) {
                $table->index('slug');
            }
        });

        Schema::table('comments', function (Blueprint $table) {
            if (!$this->hasIndex('comments', 'comments_post_id_user_id_index')) {
                $table->index(['post_id', 'user_id']);
            }
        });

        Schema::table('likes', function (Blueprint $table) {
            // Already has unique index
        });
    }

    public function down(): void
    {
        // Indexes will be dropped with tables
    }

    private function hasIndex($table, $index)
    {
        $sm = Schema::getConnection()->getDoctrineSchemaManager();
        $indexes = $sm->listTableIndexes($table);
        return array_key_exists($index, $indexes);
    }
};