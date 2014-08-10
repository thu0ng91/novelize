<?php

class NovelSectionTableSeeder extends Seeder {

    public function run()
    {
      // Sections for Book 1
      NovelSection::create([
        'novel_id' => 1,
        'section_order' => 1,
        'title' => 'Chapter 1',
        'description' => '',
        'body' => ''
      ]);
      NovelSection::create([
        'novel_id' => 1,
        'section_order' => 2,
        'title' => '',
        'description' => '',
        'body' => '<p>NovelSection 1 of Chapter 1.</p>'
      ]);
      NovelSection::create([
        'novel_id' => 1,
        'section_order' => 3,
        'title' => '',
        'description' => '',
        'body' => '<p>NovelSection 2 of Chapter 1.</p>'
      ]);
      NovelSection::create([
        'novel_id' => 1,
        'section_order' => 4,
        'title' => 'Chapter 2',
        'description' => '',
        'body' => ''
      ]);
      NovelSection::create([
        'novel_id' => 1,
        'section_order' => 5,
        'title' => '',
        'description' => '',
        'body' => '<p>NovelSection 1 of Chapter 2.</p>'
      ]);
      NovelSection::create([
        'novel_id' => 1,
        'section_order' => 6,
        'title' => '',
        'description' => '',
        'body' => '<p>NovelSection 2 of Chapter 2.</p>'
      ]);
      NovelSection::create([
        'novel_id' => 1,
        'section_order' => 7,
        'title' => '',
        'description' => '',
        'body' => '<p>NovelSection 3 of Chapter 2.</p>'
      ]);
      NovelSection::create([
        'novel_id' => 1,
        'section_order' => 8,
        'title' => 'Chapter 4',
        'description' => '',
        'body' => ''
      ]);
      NovelSection::create([
        'novel_id' => 1,
        'section_order' => 9,
        'title' => '',
        'description' => '',
        'body' => '<p>NovelSection 1 of Chapter 4.</p>'
      ]);
      NovelSection::create([
        'novel_id' => 1,
        'section_order' => 10,
        'title' => 'Chapter 5',
        'description' => '',
        'body' => ''
      ]);
      NovelSection::create([
        'novel_id' => 1,
        'section_order' => 11,
        'title' => '',
        'description' => '',
        'body' => '<p>NovelSection 1 of Chapter 5.</p>'
      ]);
    }

} 