<?php

class DatabaseSeeder extends Seeder {

    protected $tables = [
      'roles',
      'users',
      'profiles',
      'notebooks',
      'genres',
      'novels',
      'novel_sections',
      'entries',
    ];

    protected $seeders = [
      'RoleTableSeeder',
      'GenreTableSeeder',
      'UserTableSeeder',
      'NotebookTableSeeder',
      'NovelTableSeeder',
      'NovelSectionTableSeeder',
      'EntryTableSeeder',
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
