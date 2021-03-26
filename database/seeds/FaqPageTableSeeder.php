<?php

use App\Model\Pages\FaqPage;
use Illuminate\Database\Seeder;

class FaqPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            array(
                'id' => '1',
                'title' => 'Frequently Asked Questions FAQs',
                'description' => 'An FAQ is a list of frequently asked questions and answers on a particular topic. The format is often used in articles, websites, email lists, and online forums where common questions tend to recur, for example through posts or queries by new users related to common knowledge gaps.
                The purpose of an FAQ is generally to provide information on frequent questions or concerns; however, the format is a useful means of organizing information, and text consisting of questions and their answers may thus be called an FAQ regardless of whether the questions are actually frequently asked.',
                'active' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),

        ];
        foreach ($teams as $team) {
            FaqPage::create($team);
        }
    }
}