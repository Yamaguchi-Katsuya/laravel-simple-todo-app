<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetFkTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('tasks') && Schema::hasTable('users') && Schema::hasTable('task_categories')) {
            Schema::table('tasks', function (Blueprint $table) {
                $table->foreign('created_by')
                        ->references('id')
                        ->on('users')
                        ->onUpdate('cascade');

                $table->foreign('task_category_id')
                    ->references('id')
                    ->on('task_categories')
                    ->onUpdate('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'task_category_id']);
        });
    }
}
