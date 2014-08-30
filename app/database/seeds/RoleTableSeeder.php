<?php

class RoleTableSeeder extends Seeder {

	public function run()
	{
    // 1 - 9 for Customers
    Role::create(array(
      'id' => 1,
      'name' => 'customer'
    ));
    // 10 - 19 for Employees
    Role::create(array(
      'id' => 10,
      'name' => 'employee'
    ));
    // 20 -29 for Management
    Role::create(array(
      'id' => 20,
      'name' => 'manager'
    ));
    // 37 for Owner
    Role::create(array(
      'id' => 37,
      'name' => 'owner'
    ));
	}

}