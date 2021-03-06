<?php

use App\Model\Recipes\RecipesCategory;
use Illuminate\Database\Seeder;

class RecipeCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [

            array(
                'id' => '1',
                'title' => 'Functions',
                'description' => 'Your special event becomes our special event. Weddings, engagements, birthday parties – whatever the celebration may be - give it the vibe and excitement it deserves with Something Fresh’s great food experience and private catering.
                                we offer a full mobile catering and event service. Bringing the delectable aromas and vibes of street markets and festivals to your event and custom design your menu from our selection of exciting and innovative options.
                                We Want to create an atmosphere? We can create a market-style pop-up indoors or outdoors, or how about our food trucks? This will take your mobile catering experience to the next level. We not only deliver on food, but we add to the experience as well.
                                Please browse through our standard menu to see what foods you could be enjoying at your next function. Our full menu is available to download for your convenience.
                                To have Something Fresh at your next occasion, please fill out our contact form and we will give you a call to chat about your even ',
                'active' => '1',
                'avatar' => 'burger_on_braai.jpg',
                "created_at" => "2020-02-25 00:00:00",
                "updated_at" => "2020-02-25 00:00:00",
                "deleted_at" => null,
            ),

            array(
                'id' => '2',
                'title' => 'Private Chef',
                'description' => 'Manux Kitchens has a team of professionally trained chefs with years of experience in the hospitality industry.
                                  Our skill set is broad and we are  able to prepare a wide selection of dishes, ranging from traditional foods to gourmet dishes associated with fine-dining establishments.
                                  We are extremely flexible and can meet any dietary requirement. Manux Kitchens is discreet and believe that our initial consultations are key in establishing an in depth understanding of client expectations,
                                  personalised menus prepared with passion and care.
                                  We do Private dinner parties, picnic baskets, early evening drinks with a passionate team that can deliver at whatever the occasion.
                                  Visit Manux Kitchens and experience the greatest taste of our carefully prepared dishes. ',
                'active' => '1',
                'avatar' => 'manux-private-chef.jpg',
                "created_at" => "2020-02-25 00:00:00",
                "updated_at" => "2020-02-25 00:00:00",
                "deleted_at" => null,
            ),

            array(
                'id' => '3',
                'title' => 'Food Truck Kitchen',
                'description' => 'Manux food trailer is fully equipped and completely mobile. We specialise in the sous vide method of cooking allowing for exceptional flavours, without fail.
                                  Imagine succulent meats, cooking gently in their own natural juices, with organically grown herbs and homemade seasonings. We are the very first mobile kitchen to offer this sophisticated  and flawless cooking technique!
                                  Music festivals, corporate events, private celebrations - Manux food trailer is able to cater to all!
                                  Large or small, indoors our outdoors, our service can be custom made to fit your needs.
                                  We prepare delicious vegetarian and vegan dishes too and are more than happy to build your ideal menu together with you.',
                'active' => '1',
                'avatar' => 'manux-trailers.jpg',
                "created_at" => "2020-02-25 00:00:00",
                "updated_at" => "2020-02-25 00:00:00",
                "deleted_at" => null,
            ),

            array(
                "id" => "4",
                "title" => "uncategorised",
                'description' => "Your special event becomes our special event. Weddings, engagements, birthday parties – whatever the celebration may be - give it the vibe and excitement it deserves with Something Fresh’s great food experience and private catering.
                                we offer a full mobile catering and event service. Bringing the delectable aromas and vibes of street markets and festivals to your event and custom design your menu from our selection of exciting and innovative options.
                                We Want to create an atmosphere? We can create a market-style pop-up indoors or outdoors, or how about our food trucks? This will take your mobile catering experience to the next level. We not only deliver on food, but we add to the experience as well.
                                Please browse through our standard menu to see what foods you could be enjoying at your next function. Our full menu is available to download for your convenience.
                                To have Something Fresh at your next occasion, please fill out our contact form and we will give you a call to chat about your even ",
                'avatar' => 'beaf.jpg',
                "active" => "1",
                "created_at" => "2020-02-25 00:00:00",
                "updated_at" => "2020-02-25 00:00:00",
                "deleted_at" => null,
            ),
        ];
        foreach ($categories as $category) {
            RecipesCategory::create($category);
        }
    }
}