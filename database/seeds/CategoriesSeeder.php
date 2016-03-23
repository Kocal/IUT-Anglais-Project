<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Movies and animations', 'Music', 'Animals', 'Sport', 'Video games', 'Humour',
            'Entertainment', 'Science and technology'];

        foreach ($categories as $category) {
            $c = new \App\Category();
            $c->slug = str_slug($category);
            $c->category = $category;
            $c->save();
        }
    }
}
