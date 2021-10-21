<?php



use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        $cName = 'Without category';

        $categories[] = [
            'title' => $cName,
            'slug' => str_slug($cName),
            'parent_id' => 0,
        ];

        for ($i = 2; $i <= 11; $i++) {
            $cName = 'Category #' . $i;
            $parentId = ($i > 5) ? rand(1, 5) : 1;
            $categories[] = [
                'title' => $cName,
                'slug' => str_slug($cName),
                'parent_id' => $parentId,
            ];
        }
        DB::table('blog_categories')->insert($categories);
    }
}
