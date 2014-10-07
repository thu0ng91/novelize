<?php 

class CharacterTableSeeder extends Seeder {

  public function run()
  {
    Character::create(array(
      'notebook_id' => 1,
      'type_id' => 1,
      'name' => 'Joe Schmoe',
    ));
    Character::create(array(
      'notebook_id' => 1,
      'type_id' => 1,
      'name' => 'Leslie Schmoe',
    ));
    Character::create(array(
      'notebook_id' => 1,
      'type_id' => 1,
      'name' => 'Evil Jack',
    ));
    Character::create(array(
      'notebook_id' => 1,
      'type_id' => 2,
      'name' => 'Adam Short',
    ));
    Character::create(array(
      'notebook_id' => 1,
      'type_id' => 2,
      'name' => 'Lisa Smith',
    ));
    Character::create(array(
      'notebook_id' => 1,
      'type_id' => 2,
      'name' => 'Ted Buddy',
    ));
    Character::create(array(
      'notebook_id' => 1,
      'type_id' => 2,
      'name' => 'Jennifer White',
    ));
    Character::create(array(
      'notebook_id' => 1,
      'type_id' => 2,
      'name' => 'Joe Scarpeli',
    ));
    Character::create(array(
      'notebook_id' => 1,
      'type_id' => 2,
      'name' => 'Susie Machman',
    ));
    Character::create(array(
      'notebook_id' => 1,
      'type_id' => 2,
      'name' => 'Rachel Futher',
    ));
    Character::create(array(
      'notebook_id' => 1,
      'type_id' => 2,
      'name' => 'John Doe',
    ));
  }

} 