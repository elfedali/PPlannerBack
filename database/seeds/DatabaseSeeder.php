<?php

use App\Comment;
use App\Project;
use App\Role;
use App\State;
use App\Task;
use App\User;
use App\Workspace;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');


        DB::table('roles')->insert(['name' => Role::ROLE_ADMIN]);
        DB::table('roles')->insert(['name' => Role::ROLE_MODERATOR]);
        DB::table('roles')->insert(['name' => Role::ROLE_USER]);

        $count_user = 10;
        $count_workspace = 20;
        $count_project = 10;
        
        $count_task = 40;
        $count_comment = 40;

        factory(User::class, $count_user)->create();
        factory(Workspace::class, $count_workspace)->create();
        factory(Project::class, $count_project)->create();


        DB::table('states')->insert(['name' => State::STATE_NOT_STARTED]);
        DB::table('states')->insert(['name' => State::STATE_STARTED]);
        DB::table('states')->insert(['name' => State::STATE_IN_PROGRESS]);
        DB::table('states')->insert(['name' => State::STATE_FINISHED]);
        DB::table('states')->insert(['name' => State::STATE_PRIORITIZED]);
        DB::table('states')->insert(['name' => State::STATE_BLOCKED]);

        factory(Task::class, $count_task)->create();
        factory(Comment::class, $count_comment)->create();
    }
}
