<?php

class DatabaseSeeder extends Seeder {

    protected $tables = [
      'roles',
      'users',
      'profiles',
      'notebooks',
      'character_types',
      'characters',
      'genres',
      'novels',
      'chapters',
      'scenes',
      'entries',
    ];

    protected $seeders = [
      'RoleTableSeeder',
      'GenreTableSeeder',
      'UserTableSeeder',
      // 'NotebookTableSeeder',
      'CharacterTypeTableSeeder',
      // 'CharacterTableSeeder',
      // 'NovelTableSeeder',
      // 'ChapterTableSeeder',
      // 'SceneTableSeeder',
      // 'EntryTableSeeder',
    ];

    /**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->cleanDatabase();

        foreach ($this->seeders as $seedClass)
        {
            $this->call($seedClass);
        }
	}

    private function cleanDatabase()
    {
        foreach($this->tables as $table)
        {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');

            DB::table($table)->truncate();

            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }

}
