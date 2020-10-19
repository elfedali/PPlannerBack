<?php

use App\State;
use App\Task;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('body');

            $table->string('level')->default(Task::LEVEL_NOT_URGENT); 
            
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('user_id'); // created by

            $table->timestamps();

            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
