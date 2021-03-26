<?php

use App\Model\Permissions\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * The permissions for each module and partial module
         */
        $permissions = ['Create', 'List', 'Read', 'Update', 'Delete'];

        /**
         *  The admin modules that need permissions
         */
        $modules = [
            'Store',
            'store_bank',
            'store_account',
            'store_contact',
            'store_address',
            'Customer',
            'Licensor',
            'Product',
            'product_category',
            'product_brand',
            'product_color',
            'product_sub_category',
            'project_sub_category',
            'project_category',
            'Project',
            'Skill',
            'Skill_Type',
            'Department',
            'Contract',
            'Job_Title',
            'Employee',
            'Team',
            'Order',
            'recipe',
            'recipe_category',
            'recipe_method',
            'recipe_ingredient',
            'Promotion',
            'Coupon',
            'Transaction',
            'Message',
            'Notification',
            'Permission',
            'Activity Logs',
            'Setting',
            'Booking_Event',
            'Tickets',
            'PromotionType',
            'PromotionCondition',
            'PaymentType',
            'Categories',
            'Service',
            'Service_category',
            'Booking',
            'blog',
            'comment',
            'blog_category',
            'booking_Venue',
            'case_study',
            'case_study_category',
            'faq',
            'faq_category',
            'package',
            'package_category',
            'home_page',
            'service_page',
            'about_page',
            'contact_page',
            'web_project',
            'web_project_category',

        ];

        /**
         *  The partial modules which can be classified as a sub part of a module, for instance
         *  if you want to use it on a page only with @can
         */
        $partial_module = [
            'Transactions Payouts',
            'Bank Details',
        ];

        // make sure that the permissions start at the number with id
        $counter = 1;

        foreach ($modules as $module) {

            foreach ($permissions as $permission) {
                $perm = Permission::create([
                    'id' => $counter,
                    'name' => str_replace(' ', '_', strtolower($module)) . '_' . strtolower($permission),
                    'type' => strtolower($permission),
                    'description' => $module . ' ' . $permission,
                ]);
                $counter++;
//                PermissionRole::create([
                //                    ''
                //                ])
            }

        }

        foreach ($partial_module as $module) {

            foreach ($permissions as $permission) {
                Permission::create([
                    'id' => $counter,
                    'name' => str_replace(' ', '_', strtolower($module)) . '_' . strtolower($permission),
                    'type' => strtolower($permission),
                    'description' => $module . ' ' . $permission,
                ]);

                $counter++;
            }

        }

        /**
         * Any permissions where CRUD does not need to be used
         */
        $special = [
            [
                'id' => ' ',
                'name' => 'stream_on',
                'type' => 'activate',
                'description' => 'Stream on  off',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => ' ',
                'name' => 'store_on',
                'type' => 'activate',
                'description' => 'Store on  off',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => ' ',
                'name' => 'load_credits',
                'type' => 'special',
                'description' => 'Load Credits',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => ' ',
                'name' => 'view_dashboard',
                'type' => 'special',
                'description' => 'View Dashboard',
                'created_at' => now(),
                'updated_at' => now(),

            ],
        ];

        // use and to reference the outer array and change..

        foreach ($special as &$s) {
            $s['id'] = $counter;
            $counter = $counter + 1;
        }

        Permission::insert($special);

    }
}