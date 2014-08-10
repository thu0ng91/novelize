<?php

class GenreTableSeeder extends Seeder {

	public function run()
	{
    Genre::create(array(
      'id' => 1,
      'name' => 'General'
    ));
    Genre::create(array(
      'id' => 2,
      'name' => 'Adventure'
    ));
    Genre::create(array(
      'id' => 3,
      'name' => 'Fantasy'
    ));
    Genre::create(array(
      'id' => 4,
      'name' => 'Historical'
    ));
    Genre::create(array(
      'id' => 5,
      'name' => 'Horror'
    ));
    Genre::create(array(
      'id' => 6,
      'name' => 'Mystery'
    ));
    Genre::create(array(
      'id' => 7,
      'name' => 'Romance'
    ));
    Genre::create(array(
      'id' => 8,
      'name' => 'Science Fiction'
    ));
    Genre::create(array(
      'id' => 9,
      'name' => 'Thriller'
    ));
    Genre::create(array(
      'id' => 10,
      'name' => 'Young Adult'
    ));
	}

}