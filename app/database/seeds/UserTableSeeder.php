<?php


class UserTableSeeder extends Seeder {

    public function run()
    {
      Profile::create(array(
        'id' => 1,
      ));
      User::create(array(
        'id' => 1,
        'email' => 'josh@even7.com',
        'password' => 'p@ssW0rd',
        'first_name' => 'Josh',
        'last_name' => 'Evensen',
        'profile_id' => 1,
        'role_id' => 37,
      ));
    }

}