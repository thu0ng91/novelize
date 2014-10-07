<?php

class ChapterTableSeeder extends Seeder {

  public function run()
  {
    // Sections for Book 1
    Chapter::create([
      'id' => 1,
      'novel_id' => 1,
      'chapter_order' => 1,
      'title' => 'Chapter 1',
    ]);
    Chapter::create([
      'id' => 2,
      'novel_id' => 1,
      'chapter_order' => 3,
      'title' => 'Chapter 3',
    ]);
    Chapter::create([
      'id' => 3,
      'novel_id' => 1,
      'chapter_order' => 2,
      'title' => 'Chapter 2',
    ]);
    Chapter::create([
      'id' => 4,
      'novel_id' => 1,
      'chapter_order' => 5,
      'title' => 'Chapter 5',
    ]);
    Chapter::create([
      'id' => 5,
      'novel_id' => 1,
      'chapter_order' => 4,
      'title' => 'Chapter 4',
    ]);
  }
}