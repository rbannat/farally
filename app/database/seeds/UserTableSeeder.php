<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'username' => 'firstuser',
            'password' => Hash::make('first_password')
        ));

        User::create(array(
            'username' => 'seconduser',
            'password' => Hash::make('second_password')
        ));
    }

}