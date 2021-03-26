<?php

use App\Model\Pages\ContactPage;
use Illuminate\Database\Seeder;

class ContactPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ContactPage = [
            array('id' => '1',
                'title' => 'Thank You for contacting us',
                'description' => 'welcome to Manux Kitchens. We are very humbled to walk you through our dishes and explore our great kitchen',
                'active' => '1',
                'created_at' => '2020-06-25 00:00:00',
                'updated_at' => '2020-06-25 00:00:00',
            ),
        ];
        foreach ($ContactPage as $page) {
            ContactPage::create($page);
        }
    }
}