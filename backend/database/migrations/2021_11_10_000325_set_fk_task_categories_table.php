<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetFkTaskCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('task_categories') && Schema::hasTable('users')) {
            Schema::table('task_categories', function (Blueprint $table) {
                $table->foreign('created_by')
                        ->references('id')
                        ->on('users')
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
