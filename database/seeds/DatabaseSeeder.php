<?php

use Illuminate\Database\Seeder;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     *
     * @return void
     */
    public function run()
    {
        factory ('App\User', 20)->create();
        factory ('App\Company', 20)->create();
        factory ('App\Job', 20)->create();

        $categories = [

            'Technology',
            'Engineering',
            'Government',
            'Medical',
            'Construction',
            'Software',
            'Teaching',
        ];

        foreach ($categories as $category)
        {
            Category::create(['name' => $category]);
        }
    }
}
