<?php 

class NotebookTableSeeder extends Seeder {

    public function run()
    {
        // Novels
        Notebook::create(array(
            'id' => 1,
            'owner_id' => 1,
            'name' => 'Citizens of Space',
        ));
    }

} 