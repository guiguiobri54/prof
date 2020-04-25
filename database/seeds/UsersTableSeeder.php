<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Rémi',
            'first_name'=>'Rémi',
            'last_name'=>'Muller',
            'email'=>'remimuller@gmail.com',
            'password'=>bcrypt('student'),
            'role'=>'1',
            'gender'=>'male',
            'user_type'=>'student',
        ]);

        DB::table('users')->insert([
            'name'=>'Benoit',
            'first_name'=>'Benoit',
            'last_name'=>'Durand',
            'email'=>'benoitdurand@gmail.com',
            'password'=>bcrypt('student'),
            'role'=>'1',
            'gender'=>'male',
            'user_type'=>'student',
        ]);

        DB::table('users')->insert([
            'name'=>'Valentin',
            'first_name'=>'Valentin',
            'last_name'=>'Dasilva',
            'email'=>'valentindasilva@gmail.com',
            'password'=>bcrypt('student'),
            'role'=>'1',
            'gender'=>'male',
            'user_type'=>'student',
        ]);

        DB::table('users')->insert([
            'name'=>'Victor',
            'first_name'=>'Victor',
            'last_name'=>'Hussard',
            'email'=>'victorhussard@gmail.com',
            'password'=>bcrypt('student'),
            'role'=>'1',
            'gender'=>'male',
            'user_type'=>'student',
        ]);

        DB::table('users')->insert([
            'name'=>'Eric',
            'first_name'=>'Eric',
            'last_name'=>'Poitou',
            'email'=>'ericpoitou@gmail.com',
            'password'=>bcrypt('student'),
            'role'=>'1',
            'gender'=>'male',
            'user_type'=>'student',
        ]);

        DB::table('users')->insert([
            'name'=>'Michael',
            'first_name'=>'Michael',
            'last_name'=>'Dubois',
            'email'=>'michaeldubois@gmail.com',
            'password'=>bcrypt('student'),
            'role'=>'1',
            'gender'=>'male',
            'user_type'=>'student',
        ]);

        DB::table('users')->insert([
            'name'=>'Romain',
            'first_name'=>'Romain',
            'last_name'=>'Peperoni',
            'email'=>'romainpeperoni@gmail.com',
            'password'=>bcrypt('student'),
            'role'=>'1',
            'gender'=>'male',
            'user_type'=>'student',
        ]);

        DB::table('users')->insert([
            'name'=>'Pierre',
            'first_name'=>'Pierre',
            'last_name'=>'Borowski',
            'email'=>'pierreborowski@gmail.com',
            'password'=>bcrypt('student'),
            'role'=>'1',
            'gender'=>'male',
            'user_type'=>'student',
        ]);

        DB::table('users')->insert([
            'name'=>'Lucie',
            'first_name'=>'Lucie',
            'last_name'=>'Dupont',
            'email'=>'luciedupont@gmail.com',
            'password'=>bcrypt('student'),
            'role'=>'1',
            'gender'=>'female',
            'user_type'=>'student',
        ]);

        DB::table('users')->insert([
            'name'=>'Julie',
            'first_name'=>'Julie',
            'last_name'=>'Biglieti',
            'email'=>'juliebiglieti@gmail.com',
            'password'=>bcrypt('student'),
            'role'=>'1',
            'gender'=>'female',
            'user_type'=>'student',
        ]);

        DB::table('users')->insert([
            'name'=>'Mathilde',
            'first_name'=>'Mathilde',
            'last_name'=>'Jacques',
            'email'=>'mathildejacques@gmail.com',
            'password'=>bcrypt('student'),
            'role'=>'1',
            'gender'=>'female',
            'user_type'=>'student',
        ]);

        DB::table('users')->insert([
            'name'=>'Marie',
            'first_name'=>'Marie',
            'last_name'=>'Zubrowska',
            'email'=>'mariezubrowska@gmail.com',
            'password'=>bcrypt('student'),
            'role'=>'1',
            'gender'=>'female',
            'user_type'=>'student',
        ]);

        DB::table('users')->insert([
            'name'=>'Estelle',
            'first_name'=>'Estelle',
            'last_name'=>'Bega',
            'email'=>'estellebega@gmail.com',
            'password'=>bcrypt('student'),
            'role'=>'1',
            'gender'=>'female',
            'user_type'=>'student',
        ]);

        DB::table('users')->insert([
            'name'=>'Claire',
            'first_name'=>'Claire',
            'last_name'=>'Lefebvre',
            'email'=>'clairelefebvre@gmail.com',
            'password'=>bcrypt('student'),
            'role'=>'1',
            'gender'=>'female',
            'user_type'=>'student',
        ]);

        DB::table('users')->insert([
            'name'=>'Isabelle',
            'first_name'=>'Isabelle',
            'last_name'=>'Perret',
            'email'=>'isabelleperret@gmail.com',
            'password'=>bcrypt('student'),
            'role'=>'1',
            'gender'=>'female',
            'user_type'=>'student',
        ]);

        DB::table('users')->insert([
            'name'=>'Sophie',
            'first_name'=>'Sophie',
            'last_name'=>'Collin',
            'email'=>'sophiecollin@gmail.com',
            'password'=>bcrypt('student'),
            'role'=>'1',
            'gender'=>'female',
            'user_type'=>'student',
        ]);

        DB::table('users')->insert([
            'name'=>'Jacqueline',
            'first_name'=>'Jacqueline',
            'last_name'=>'Martin',
            'email'=>'jacquelinemartin@gmail.com',
            'password'=>bcrypt('teacher'),
            'role'=>'2',
            'gender'=>'female',
            'user_type'=>'teacher',
        ]);

        DB::table('users')->insert([
            'name'=>'Gisèle',
            'first_name'=>'Gisèle',
            'last_name'=>'Monnier',
            'email'=>'giselemonnier@gmail.com',
            'password'=>bcrypt('teacher'),
            'role'=>'2',
            'gender'=>'female',
            'user_type'=>'teacher',
        ]);

        DB::table('users')->insert([
            'name'=>'Patrick',
            'first_name'=>'Patrick',
            'last_name'=>'Ziegler',
            'email'=>'patrickziegler@gmail.com',
            'password'=>bcrypt('teacher'),
            'role'=>'2',
            'gender'=>'male',
            'user_type'=>'teacher',
        ]);
    }
}
