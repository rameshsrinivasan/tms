<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateTimeTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->date('date')->after('project_id');
            $table->time('time')->after('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            if (Schema::hasTable('tasks')) {
                if (Schema::hasColumn('tasks', 'date')) {
                    $table->dropColumn('date');
                    $table->dropColumn('time');
                }
            }
        });
    }
}
