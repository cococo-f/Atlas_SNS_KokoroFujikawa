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
            ['username' => 'おもち'],
            ['username' => 'えび'],
            ['username' => 'ぎょうざ']
        ]);

    }
}
