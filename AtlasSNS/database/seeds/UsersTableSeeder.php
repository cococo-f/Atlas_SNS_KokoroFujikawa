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
        //初期ユーザー作成//
        DB::table('users')->insert([

            ['username' => 'おもち',
             'mail' => 'omochi@0815.com',
             'password' => bcrypt('password'),],

            ['username' => 'ぎょうざ',
             'mail' => 'gyouza@0704.com',
             'password' => bcrypt('password'),],

             ['username' => 'えび',
             'mail' => 'ebi@1102.com',
             'password' =>bcrypt('password'),]

        ]);

    }
}
