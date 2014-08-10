<?php

class NovelTableSeeder extends Seeder {

  public function run()
  {

    // Novels
    Novel::create(array(
      'id' => 1,
      'owner_id' => 1,
      'notebook_id' => 1,
      'title' => 'Fantasy Novel',
      'author' => 'Josh Evensen',
      'genre_id' => 1
    ));
    Novel::create(array(
      'id' => 2,
      'owner_id' => 1,
      'notebook_id' => 1,
      'title' => 'Romance Novel',
      'author' => 'Anita Evensen',
      'genre_id' => 1
    ));
  }

} 