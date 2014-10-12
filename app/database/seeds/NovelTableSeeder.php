<?php

class NovelTableSeeder extends Seeder {

  public function run()
  {

    // Novels
    Novel::create(array(
      'id' => 1,
      'owner_id' => 1,
      'notebook_id' => 1,
      'title' => 'Nuclear Earth',
      'author' => 'Josh Evensen',
      'genre_id' => 8
    ));
  }

}