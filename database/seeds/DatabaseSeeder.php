<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleTableSeeder::class,
            PermissionsTableSeeder::class,
            PermissionsRolesTableSeeder::class,
            UsersTableSeeder::class,
            StatusTableSeeder::class,
            StoreTableSeeder::class,
            LicensorsTableSeeder::class,
            HoursTableSeeder::class,
            // ProductCategoriesTableSeeder::class,
            // ProductSubCategoriesTableSeeder::class,
            // BrandTableSeeder::class,
            // ColorTableSeeder::class,
            // ProductTableSeeder::class,
            ContractTableSeeder::class,
            JobTitleTableSeeder::class,
            DepartmentTableSeeder::class,
             EmployeeCategorySeeder::class,
            EmployeeTableSeeder::class,
            SkillLevelsTableSeeder::class,
            SkillTypeTableSeeder::class,
            SkillTableSeeder::class,
            TeamsTableSeeder::class,
            // ProjectCategoriesTableSeeder::class,
            // ProjectsTableSeeder::class,
            // BlogCategorySeeder::class,
            // BlogSeeder::class,
            // CommentsTableSeeder::class,
            CaseStudyCategorySeeder::class,
            CaseStudySeeder::class,
            //VenueSeeder::class,
            // EventSeeder::class,
            BookingCategorySeeder::class,
            // BookingSeeder::class,
            // FaqTableSeeder::class,
            CategoryTableSeeder::class,
            AboutUsTableSeeder::class,
            BlogPageTableSeeder::class,
            //RecipeCategoriesTableSeeder::class,
            //RecipeTableSeeder::class,
            TeamEmployeesTableSeeder::class,
            TeamPageTableSeeder::class,
            ProductPageTableSeeder::class,
            ProjectPageTableSeeder::class,
            RecipePageTableSeeder::class,
            ServicePageTableSeeder::class,
            ContactPageTableSeeder::class,
            // PackageTableSeeder::class,
            ProductCategoryPageTableSeeder::class,
            // ProductsCategoryTableSeeder::class,
        ]);
    }
}