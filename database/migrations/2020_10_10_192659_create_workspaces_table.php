<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkspacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workspaces', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('body', 1000)->nullable();
            $table->string('logo')->nullable();
            $table->string('thumbnail')->nullable();

            $table->integer('members_count')->nullable();
            $table->integer('projects_count')->nullable();

            $table->bigInteger('user_id')->unsigned(); // Created By

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workspaces');
    }
}
