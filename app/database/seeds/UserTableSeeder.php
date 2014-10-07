<?php


class UserTableSeeder extends Seeder {

    public function run()
    {
      Profile::create(array(
        'id' => 1,
        'first_name' => 'Josh',
        'last_name' => 'Evensen'
      ));
      User::create(array(
        'id' => 1,
        'email' => 'josh@even7.com',
        'password' => 'p@ssW0rd',
        'profile_id' => 1,
        'role_id' => 37,
      ));
    }

}