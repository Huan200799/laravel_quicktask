<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
            [
                'name'=>"Nguyễn Đình Huân",
                'task_id_user'=>1
            ],
        ];
        DB::table('vp_tasks')->insert($data);
    }
}
