<?php

use App\Model\Employees\SkillType;
use Illuminate\Database\Seeder;

class SkillTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $types = [
            array(
                'id' => '1',
                'title' => 'sushi Chef',
                'description' => 'Creating a rich sushi menu with various main ingredients and raw fish (for example, salmon, tuna, unagi) Preparing all types of sushi, including maki, nigiri and sashimi. Selecting fresh fruits and vegetables to make high-quality dishes (including avocado, mango and carrots)',
                'active' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '2',
                'title' => 'event Management',
                'description' => 'An event manager oversees the design, set-up, and execution of events that bring people together. These events can run from small networking meetings with a few dozen guests to large-scale conferences with thousands of attendees over several days—and everything in between',
                'active' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '3',
                'title' => 'Private Chef',
                'description' => "A private chef is employed by one individual or family full time, and often lives in, preparing up to three meals per day. A personal chef serves several clients, usually one per day, and provides multiple meals that are custom-designed for the clients' particular requests and requirements.",
                'active' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '4',
                'title' => 'Personal Chef',
                'description' => "As a personal chef serves several clients, usually one per day, and provides multiple meals that are custom-designed for the clients' particular requests and requirements.",
                'active' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '5',
                'title' => 'Waitress/Waitron',
                'description' => "Providing excellent wait service to ensure satisfaction. Taking customer orders and delivering food and beverages. Making menu recommendations, answering questions and sharing additional information with team patrons.",
                'active' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),
            array(
                'id' => '6',
                'title' => 'Customer Service',
                'description' => "Customer service is both a type of job and a set of job skills. As a job, customer service professionals are responsible for addressing customer needs and ensuring they have a good experience. As a skill set, customer service entails several qualities like active listening, empathy, problem-solving and communication. Customer service is used in many jobs at every level. What are customer service skills?
Customer service skills are the set of behaviors you rely on when interacting with a customer. They can also be useful when following up after an initial conversation. For example, if you work as a virtual assistant for a technology company, you may need to help customers troubleshoot problems with their devices. To accomplish this, you will likely use several different skills:

Communication. You will need to be responsive in a timely manner. You will need to communicate with them in a clear, easy-to-understand way to solve the problem.
Empathy. Your interactions may begin with someone who is frustrated or unhappy. It is important that you understand and identify with the feelings of others and communicate accordingly.
Patience. Clients and customers might ask several questions, be unhappy or ask you to repeat instructions several times. Patience is important to keep the conversation on track, remain personable and provide a positive experience.
Technical knowledge. To effectively solve problems, you will likely need to know a bit of technical or industry knowledge to help them resolve the issue at hand.",
                'active' => '1',
                'created_at' => '2020-02-25 00:00:00',
                'updated_at' => '2020-02-25 00:00:00',
            ),

        ];

        foreach ($types as $skill) {
            SkillType::create($skill);
        }

    }
}