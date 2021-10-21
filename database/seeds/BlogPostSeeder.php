<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = [];



        for ($i = 0; $i < 13; $i++) {
            $content=random_bytes(54);
            $fields = [
                'category_id' => rand(2, 11),
                'user_id' => rand(1, 2),
                'slug' => 'Babor_pug_' . $i,
                'title' => 'Babor_pug_' . $i,
                'excerpt' =>  "{fgwargaefg}".$i,
                'content_raw' => 'content'. $i,
                'content_html' => 'content'. $i,
                'is_published' => (rand(1, 7) == 6) ? '0' : '1'
            ];
            DB::table('blog_posts')->insert($fields);
        }
    }
}
