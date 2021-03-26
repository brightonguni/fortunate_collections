<?php

use App\Model\Permissions\Permission;
use App\Model\Permissions\PermissionsRole;
use Illuminate\Database\Seeder;

class PermissionsRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permis = Permission::pluck('id', 'name')->all();

        // make sure that the permission is unique

        $permis_name_id = [];

        $admin_cannot_values = [
            'store_delete',
            'licensor_delete',
            'transaction_delete',
            'transaction_update',

            'transactions_payouts_update',
            'transactions_payouts_delete',

            'home_page_create',
            'home_page_list',
            'home_page_read',
            'home_page_update',
            'home_page_delete',

            'service_page_list',
            'service_page_create',
            'service_page_read',
            'service_page_update',
            'service_page_delete',

            'about_page_create',
            'about_page_list',
            'about_page_read',
            'about_page_update',
            'about_page_delete',

            'contact_page_create',
            'contact_page_list',
            'contact_page_read',
            'contact_page_update',
            'contact_page_delete',

            'web_project_read',
            'web_project_list',

            'web_project_category_read',
            'web_project_category_list',

        ];

        $admin_cannot = $this->nameToIds($admin_cannot_values, $permis);

        $all = Permission::all()->pluck('id')->toArray();

        // get permission numbers

        $admin_can = $this->includeIds($all, $admin_cannot);

        $licensor_cannot_values = [
            'store_delete',
            'customer_delete',
            'licensor_list',
            'licensor_read',
            'licensor_delete',

            'package_list',
            'package_read',
            'package_create',
            'package_update',
            'package_delete',

            'package_category_create',
            'package_category_list',
            'package_category_read',
            'package_category_update',
            'package_category_delete',

            'faq_list',
            'faq_create',
            'faq_update',
            'faq_delete',
            'faq_read',

            'faq_category_list',
            'faq_category_create',
            'faq_category_update',
            'faq_category_read',
            'faq_category_delete',

            'product_read',
            'product_delete',
            'product_create',
            'product_list',

            'product_category_create',
            'product_category_list',
            'product_category_read',
            'product_category_update',
            'product_category_delete',

            'product_brand_create',
            'product_brand_read',
            'product_brand_list',
            'product_brand_update',
            'product_brand_delete',

            'product_color_create',
            'product_color_list',
            'product_color_read',
            'product_color_update',
            'product_color_delete',

            'product_sub_category_create',
            'product_sub_category_list',
            'product_sub_category_read',
            'product_sub_category_update',
            'product_sub_category_delete',

            'project_category_create',
            'project_category_list',
            'project_category_read',
            'project_category_update',
            'project_category_delete',

            'project_sub_category_create',
            'project_sub_category_list',
            'project_sub_category_read',
            'project_sub_category_update',
            'project_sub_category_delete',

            'blog_list',
            'blog_read',
            'blog_delete',
            'blog_create',
            'blog_update',

            'comment_list',
            'comment_delete',
            'comment_read',
            'comment_create',
            'comment_update',

            'service_list',
            'service_delete',
            'service_create',
            'service_update',

            'service_category_delete',
            'service_category_list',
            'service_category_read',
            'service_category_create',
            'service_category_update',

            'case_study_category_list',
            'case_study_category_delete',
            'case_study_category_create',
            'case_study_category_update',

            'case_study_list',
            'case_study_delete',
            'case_study_read',
            'case_study_create',
            'case_study_update',

            'comment_list',
            'comment_delete',
            'comment_create',
            'comment_update',

            'booking_delete',
            'booking_update',

            'project_delete',
            'project_update',

            'department_delete',
            'department_update',

            'contract_update',

            'job_title_delete',

            'skill_delete',

            'skill_type_delete',

            'team_delete',

            'order_delete',
            'transaction_delete',
            'transaction_update',
            'tickets_delete',
            'bank_details_update',
            'bank_details_delete',
            'transactions_payouts_update',
            'transactions_payouts_delete',

            'categories_create',
            'categories_list',
            'categories_read',
            'categories_update',
            'categories_delete',

            'notification_create',
            'notification_list',
            'notification_update',
            'notification_read',
            'notification_delete',
            'permission_create',
            'permission_list',
            'permission_read',
            'permission_update',
            'permission_delete',
            'activity_logs_create',
            'activity_logs_list',
            'activity_logs_read',
            'activity_logs_update',
            'activity_logs_delete',
            'setting_create',
            'setting_list',
            'setting_read',
            'setting_update',
            'setting_delete',

            'booking_event_delete',

            'booking_venue_delete',

            'tickets_create',
            'tickets_list',
            'tickets_read',
            'tickets_update',
            'tickets_delete',
            'stream_on',
            'load_credits',
            'store_on',

            'home_page_create',
            'home_page_list',
            'home_page_read',
            'home_page_update',
            'home_page_delete',

            'service_page_list',
            'service_page_create',
            'service_page_read',
            'service_page_update',
            'service_page_delete',

            'about_page_create',
            'about_page_list',
            'about_page_read',
            'about_page_update',
            'about_page_delete',

            'contact_page_create',
            'contact_page_list',
            'contact_page_read',
            'contact_page_update',
            'contact_page_delete',

            'web_project_list',
            'web_project_read',

            'web_project_category_read',
            'web_project_category_list',

        ];

        $licensor_cannot = $this->nameToIds($licensor_cannot_values, $permis);

//        for ($from = 46; $from<=75; $from++) {
        //            $licensor_excl[] += $from;
        //        }
        //        $licensor_excl = array_merge($licensor_excl, $new_array);
        //        $licensor_excl[] = 101;
        //        $licensor_excl[] = 103;

        $licenser_can = $this->includeIds($all, $licensor_cannot);

        $business_can_values = [
            'store_update',

            'store_bank_list',
            'store_bank_create',
            'store_bank_read',
            'store_bank_update',
            'store_bank_delete',

            'store_address_list',
            'store_address_create',
            'store_address_read',
            'store_address_update',
            'store_address_delete',

            'store_account_list',
            'store_account_create',
            'store_account_read',
            'store_account_update',
            'store_account_delete',

            'store_contact_list',
            'store_contact_create',
            'store_contact_read',
            'store_contact_update',
            'store_contact_delete',

            'customer_list',
            'customer_read',
            'project_sub_category_create',
            'project_sub_category_list',
            'project_sub_category_read',
            'project_sub_category_update',
            'project_sub_category_delete',

            'project_list',
            'project_read',
            'project_create',

            'faq_list',
            'faq_create',
            'faq_update',
            'faq_delete',
            'faq_read',

            'recipe_list',
            'recipe_read',
            'recipe_update',
            'recipe_create',
            'recipe_delete',

            'recipe_category_list',
            'recipe_category_read',
            'recipe_category_create',
            'recipe_category_update',
            'recipe_category_delete',

            'recipe_method_list',
            'recipe_method_read',
            'recipe_method_create',
            'recipe_method_update',
            'recipe_method_delete',

            'recipe_ingredient_list',
            'recipe_ingredient_read',
            'recipe_ingredient_create',
            'recipe_ingredient_update',
            'recipe_ingredient_delete',

            'faq_category_list',
            'faq_category_create',
            'faq_category_update',
            'faq_category_read',
            'faq_category_delete',

            'product_read',
            'product_delete',
            'product_create',
            'product_list',

            'blog_list',
            'blog_delete',
            'blog_read',
            'blog_create',
            'blog_update',

            'case_study_list',
            'case_study_delete',
            'case_study_read',
            'case_study_create',
            'case_study_update',

            'case_study_category_list',
            'case_study_category_delete',
            'case_study_category_create',
            'case_study_category_update',

            'comment_list',
            'comment_delete',
            'comment_read',
            'comment_create',
            'comment_update',

            'service_list',
            'service_delete',
            'service_create',
            'service_update',

            'service_category_delete',
            'service_category_list',
            'service_category_read',
            'service_category_create',
            'service_category_update',

            'blog_category_list',
            'blog_category_delete',
            'blog_category_create',
            'blog_category_update',

            'booking_list',
            'booking_delete',
            'booking_create',
            'booking_update',

            'skill_list',
            'skill_read',
            'skill_create',
            'skill_delete',
            'skill_update',

            'skill_type_list',
            'skill_type_read',
            'skill_type_create',
            'skill_type_delete',
            'skill_type_update',

            'department_create',
            'department_read',
            'department_delete',
            'department_update',
            'department_list',

            'contract_create',
            'contract_read',
            'contract_delete',
            'contract_update',
            'contract_list',

            'job_title_create',
            'job_title_read',
            'job_title_delete',
            'job_title_update',
            'job_title_list',

            'product_create',
            'product_list',
            'product_read',
            'product_update',
            'product_delete',

            'team_read',
            'team_create',
            'team_list',
            'team_delete',
            'product_list',
            'product_read',
            'product_update',
            'product_delete',
            'order_list',
            'order_read',
            'transaction_list',
            'transaction_read',

            'promotiontype_create',
            'promotiontype_list',
            'promotiontype_read',
            'promotiontype_update',
            'promotiontype_delete',

            'promotioncondition_create',
            'promotioncondition_list',
            'promotioncondition_read',
            'promotioncondition_update',
            'promotioncondition_delete',

            'product_category_create',
            'product_category_list',
            'product_category_read',
            'product_category_update',
            'product_category_delete',

            'product_brand_create',
            'product_brand_read',
            'product_brand_list',
            'product_brand_update',
            'product_brand_delete',

            'product_color_create',
            'product_color_list',
            'product_color_read',
            'product_color_update',
            'product_color_delete',

            'product_sub_category_create',
            'product_sub_category_list',
            'product_sub_category_read',
            'product_sub_category_update',
            'product_sub_category_delete',

            'project_category_create',
            'project_category_list',
            'project_category_read',
            'project_category_update',
            'project_category_delete',

            'paymenttype_create',
            'paymenttype_list',
            'paymenttype_read',
            'paymenttype_update',
            'paymenttype_delete',
            'transactions_payouts_create',
            'transactions_payouts_list',
            'transactions_payouts_read',

            'bank_details_create',
            'bank_details_read',
            'view_dashboard',

            'booking_event_create',
            'booking_event_list',
            'booking_event_read',
            'booking_event_update',
            'booking_event_delete',

            'booking_venue_create',
            'booking_venue_list',
            'booking_venue_read',
            'booking_venue_update',
            'booking_venue_delete',

            'home_page_create',
            'home_page_list',
            'home_page_read',
            'home_page_update',
            'home_page_delete',

            'service_page_list',
            'service_page_create',
            'service_page_read',
            'service_page_update',
            'service_page_delete',

            'about_page_create',
            'about_page_list',
            'about_page_read',
            'about_page_update',
            'about_page_delete',

            'contact_page_create',
            'contact_page_list',
            'contact_page_read',
            'contact_page_update',
            'contact_page_delete',

            'web_project_list',
            'web_project_read',

            'web_project_category_read',
            'web_project_category_list',
        ];

        $business_can = $this->nameToIds($business_can_values, $permis);

        // customer may
        // DO

        $permissions = [
            [
                'role_id' => '1',
                'permissions_id_includes' => $admin_can,
            ],
            [
                'role_id' => '2',
                'permissions_id_includes' => [],
            ],
            [
                'role_id' => '3',
                'permissions_id_includes' => $business_can,
            ],
            [
                'role_id' => '4',
                'permissions_id_includes' => $licenser_can,
            ],

        ];

        foreach ($permissions as $perms) {

            foreach ($perms['permissions_id_includes'] as $i) {
                PermissionsRole::create([
                    'role_id' => $perms['role_id'],
                    'permission_id' => $i,
                ]);
            }
        }

    }

    // used this function because didn't want to type out lots of included roles if they exceed the ones that are not included

    /**
     * Pass the array of all permission ids and the array of all excluded ids
     * return the array of included ids
     */
    private function includeIds($all, $excludes)
    {
        $included = $all;
        foreach ($excludes as $ke => $id) {

            foreach ($included as $k => $i) {
                if ($i == $id) {
                    unset($included[$k]);
                }
            }
        }

        return $included;
    }

    /**
     * Pass the array of permission names and the array of permissions
     * [ 'name' => 'id', 'name' => 'id']
     * return the array of ids
     */

    private function nameToIds(array $p_names, $permis_name_id)
    {
        $new_a = [];
        foreach ($p_names as $k => $v) {
            $new_a[] = $permis_name_id[$v];
        }
        return $new_a;
    }
}