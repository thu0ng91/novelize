<?php

class RoleTableSeeder extends Seeder {

	public function run()
	{
    Role::create(array(
      'id' => 1,
      'name' => 'customer'
    ));
    Role::create(array(
      'id' => 2,
      'name' => 'owner'
    ));
    Role::create(array(
      'id' => 3,
      'name' => 'manager'
    ));
    Role::create(array(
      'id' => 4,
      'name' => 'employee'
    ));
	}

}