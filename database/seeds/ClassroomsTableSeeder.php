<?php

use Illuminate\Database\Seeder;

class ClassroomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Classrooms')->insert([
            'name'=>'Terminal L1',
            'subject'=>'Histoire-Géographie',
            'school'=>'Louis Bertrand Briey',
            'creator'=>'',
            'user_id'=>'',
        ]);
    }
}
