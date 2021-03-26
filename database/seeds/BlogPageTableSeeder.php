<?php

use App\Model\Pages\BlogPage;
use Illuminate\Database\Seeder;

class BlogPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $BlogPage = [
            array('id' => '1',
                'title' => 'Blog Articles',
                'description' => 'The purpose of a blog is to aid marketing to a point where the content you deliver is targeted specifically to the wants and needs of your audience. Provide answers to their most commonly asked questions or provide advice to areas within your niche that your business is an expert on',
                'active' => '1',
                'created_at' => '2020-06-25 00:00:00',
                'updated_at' => '2020-06-25 00:00:00',
            ),
        ];
        foreach ($BlogPage as $page) {
            BlogPage::create($page);
        }
    }
}