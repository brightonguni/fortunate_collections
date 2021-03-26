<?php

use App\Model\Blogs\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = [
            array(
                'id' => '1',
                'comment' => 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industrys standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'blog_id' => '1',
                'user_id' => '1',
                'active' => '1',

            ),
            array(
                'id' => '2',
                'comment' => 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industrys standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'blog_id' => '1',
                'user_id' => '3',
                'active' => '1',

            ),

        ];
        foreach ($comments as $comment) {
            Comment::create($comment);
        }
    }
}