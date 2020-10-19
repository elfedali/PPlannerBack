<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('slug')->unique();
            $table->string('body',200)->nullable();

            $table->string("thumbnail")->nullable();

            $table->dateTime("start_date")->nullable();
            $table->dateTime("target_end_date")->nullable();
            $table->dateTime("actual_end_date")->nullable();

            $table->double("budget")->default(0.00);

           
            $table->unsignedBigInteger('user_id'); // belongs to
            $table->unsignedBigInteger('workspace_id'); // belongs to

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('workspace_id')->references('id')->on('workspaces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
