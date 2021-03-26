<?php

use App\Model\Bookings\BookingCategory;
use Illuminate\Database\Seeder;

class BookingCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bookingCategories = [
            array(
                'id' => '1',
                'active' => '1',
                'title' => 'Private Chef',
                'avatar' => 'manux-private-chef.jpg',
                'description' => 'Manux Kitchens has a team of professionally trained chefs with years of experience in the hospitality industry.
                                  Our skill set is broad and we are  able to prepare a wide selection of dishes, ranging from traditional foods to gourmet dishes associated with fine-dining establishments.
                                  We are extremely flexible and can meet any dietary requirement. Manux Kitchens is discreet and believe that our initial consultations are key in establishing an in depth understanding of client expectations,
                                  personalised menus prepared with passion and care.
                                  We do Private dinner parties, picnic baskets, early evening drinks with a passionate team that can deliver at whatever the occasion.
                                  Visit Manux Kitchens and experience the greatest taste of our carefully prepared dishes. ',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '2',
                'title' => 'Food Truck',
                'active' => '1',
                'avatar' => 'manux-trailers.jpg',
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
                'avatar' => 'burger_3.jpg',
                'description' => 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industrys standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
        ];
        foreach ($bookingCategories as $category) {
            BookingCategory::create($category);
        }

    }
}
