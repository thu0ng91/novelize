<?php

class GenreTableSeeder extends Seeder {

	public function run()
	{
    Genre::create(array(
      'id' => 1,
      'name' => 'General'
    ));
    Genre::create(array(
      'id' => 5,
      'name' => 'Adventure'
    ));
    Genre::create(array(
      'id' => 5,
      'name' => 'Fantasy'
    ));
    Genre::create(array(
      'id' => 2,
      'name' => 'Historical'
    ));
    Genre::create(array(
      'id' => 3,
      'name' => 'Horror'
    ));
    Genre::create(array(
      'id' => 4,
      'name' => 'Mystery'
    ));
    Genre::create(array(
      'id' => 5,
      'name' => 'Romance'
    ));
    Genre::create(array(
      'id' => 5,
      'name' => 'Science Fiction'
    ));
    Genre::create(array(
      'id' => 5,
      'name' => 'Thriller'
    ));
    Genre::create(array(
      'id' => 5,
      'name' => 'Young Adult'
    ));
	}

}