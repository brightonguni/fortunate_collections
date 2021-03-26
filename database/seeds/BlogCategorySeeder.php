<?php

use App\Model\Blogs\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogCategories = [
            array(
                'id' => '1',
                'active' => '1',
                'title' => 'Commercial Cleaning',
                'avatar' => 'building.jpg',
                'store_id' => '1',
                'licensor_id' => '1',
                'description' => 'we have a team of professionally trained chefs with years of experience in the hospitality industry.
                                  Our skill set is broad and we are  able to prepare a wide selection of dishes, ranging from traditional foods to gourmet dishes associated with fine-dining establishments.
                                  We are extremely flexible and can meet any dietary requirement. Manux Kitchens is discreet and believe that our initial consultations are key in establishing an in depth understanding of client expectations,
                                  personalised menus prepared with passion and care',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '2',
                'title' => 'Residential Cleaning',
                'active' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'avatar' => 'apartment.jpg',
                'description' => 'Manux food truck is fully equipped and completely mobile. We specialise in the sous vide method of cooking allowing for exceptional flavours, without fail.
                                  Imagine succulent meats, cooking gently in their own natural juices, with organically grown herbs and homemade seasonings. We are the very first mobile kitchen to offer this sophisticated  and flawless cooking technique!
                                  Music festivals, corporate events, private celebrations - Manux food truck is able to cater to all!
                                  Large or small, indoors our outdoors, our service can be custom made to fit your needs',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '3',
                'title' => 'General',
                'active' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'avatar' => 'cat.jpg',
                'description' => 'This contains the most important news both here and abroad. It is usually found on the front page of the newspaper. The title of the most important news is printed in big bold letters. ... Local and Foreign News Section- Part of this section contains news from the towns and cities of the nation',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '4',
                'title' => 'Health and fitness',
                'active' => '1',
                'avatar' => 'garden.jpg',
                'store_id' => '1',
                'licensor_id' => '1',
                'description' => 'So many fitness fanatics love to tout the incredible benefits of working out in the early morning hours.
                                  “You’ll feel so much more energized for the rest of the day.',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '5',
                'title' => 'Post Construction Cleaning',
                'active' => '1',
                'store_id' => '1',
                'licensor_id' => '1',
                'avatar' => 'building.jpg',
                'description' => 'Your special event becomes our special event. Weddings, engagements, birthday parties – whatever the celebration may be - give it the vibe and excitement it deserves with Something Fresh’s great food experience and private catering.
                                we offer a full mobile catering and event service. Bringing the delectable aromas and vibes of street markets and festivals to your event and custom design your menu from our selection of exciting and innovative options.
                                We Want to create an atmosphere? We can create a market-style pop-up indoors or outdoors, or how about our food trucks? This will take your mobile catering experience to the next level. We not only deliver on food, but we add to the experience as well.
                                Please browse through our standard menu to see what foods you could be enjoying at your next function. Our full menu is available to download for your convenience.
                                To have Something Fresh at your next occasion, please fill out our contact form and we will give you a call to chat about your even',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),

        ];
        foreach ($blogCategories as $category) {
            BlogCategory::create($category);
        }
    }
}