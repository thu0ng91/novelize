<?php

class CharacterTypeTableSeeder extends Seeder {

	public function run()
	{
    CharacterType::create(array(
      'id' => 1,
      'name' => 'Major'
    ));
    CharacterType::create(array(
      'id' => 2,
      'name' => 'Minor'
    ));
  }

}