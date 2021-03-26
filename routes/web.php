<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/home', function () {
//     return view('home', 'HomeController@index')->name('home.index');
// });
Route::get('/admin', 'Admin\AdminController@landing_page')->name('admin.login');

Auth::routes();

Route::get('/dashboard', 'Admin\AdminController@index')->name('dashboard.index');
Route::get('/signup', 'Auth\RegisterController@sign_up')->name('register'); # create a new user
Route::get('', 'HomeController@index')->name('home.index');

//Pages
Route::group(['prefix' => 'page/'], function () {
    Route::get('', 'Admin\Pages\PageController@index')->name('page.index')->middleware('permission:page_list'); # index
    Route::get('create', 'Admin\Pages\PageController@create')->name('page.create')->middleware('permission:page_create'); # create
    Route::post('/store', 'Admin\Pages\PageController@store')->name('page.store')->middleware('permission:page_create'); # store
    Route::get('/{id}', 'Admin\Pages\PageController@show')->name('page.show')->middleware('permission:page_read'); # show
    Route::get('/{id}/edit', 'Admin\Pages\PageController@edit')->name('page.edit')->middleware('permission:page_update'); # edit
    Route::post('/{id}', 'Admin\Pages\PageController@update')->name('page.update')->middleware('permission:page_update'); # update
    Route::delete('/{id}', 'Admin\Pages\PageController@destroy')->name('page.delete')->middleware('permission:page_delete'); # remove
});

Route::group(['prefix' => 'permissions/'], function () {
    Route::get('', 'Permissions\PermissionsController@index')->name('permissions.index')->middleware('permission:permission_list');
    Route::post('/store', 'Permissions\PermissionsController@store')->name('permissions.store')->middleware('permission:permission_create');
    Route::get('/create', 'Permissions\PermissionsController@create')->name('permissions.create');
    Route::get('/{id}', 'Permissions\PermissionsController@show')->name('permissions.show')->middleware('permission:permission_read');
    Route::get('/{id}/edit', 'Permissions\PermissionsController@edit')->name('permissions.edit')->middleware('permission:permission_update');
    Route::put('', 'Permissions\PermissionsController@update')->name('permissions.update')->middleware('permission:permission_update');
});

Route::group(['prefix' => 'licensors/'], function () {
    Route::get('', 'Licensors\LicensorController@index')->name('licensors.index')->middleware('permission:licensor_list');
    Route::post('/store', 'Licensors\LicensorController@store')->name('licensors.store')->middleware('permission:licensor_create');
    Route::get('/create', 'Licensors\LicensorController@create')->name('licensors.create')->middleware('permission:licensor_create');
    Route::get('/{id}', 'Licensors\LicensorController@show')->name('licensors.show')->middleware('permission:licensor_read');
    Route::get('/{id}/edit', 'Licensors\LicensorController@edit')->name('licensors.edit')->middleware('permission:licensor_update');
    Route::put('/{id}', 'Licensors\LicensorController@update')->name('licensors.update')->middleware('permission:licensor_update');
    Route::get('licensor_partial/{number}', 'Licensors\LicensorController@getLinkPartial')->middleware('permission:licensor_update');
});

/*------------------------- users------------------------------------------*/
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/test', 'CustomerController@index');

Route::group(['prefix' => 'users/'], function () {
    Route::get('', 'Customers\CustomerController@index')->name('users.index')->middleware('permission:customer_list'); # index ;
    Route::post('/topup', 'Customers\CustomerController@topUp')->middleware('permission:customer_update');
    Route::get('/create', 'Customers\CustomerController@create')->name('user.create')->middleware('permission:customer_create'); # create
    Route::post('store', 'Customers\CustomerController@store')->name('users.store')->middleware('permission:customer_create'); # store
    Route::get('/{id}', 'Customers\CustomerController@show')->name('user.show')->middleware('permission:customer_read'); # show
    Route::get('/{id}/edit', 'Customers\CustomerController@edit')->name('users.edit')->middleware('permission:customer_update'); # edit
    //    Route::post('/{id}/edit','CustomerController@edit')->name('users.edit'); # edit
    Route::put('/{id}', 'Customers\CustomerController@update')->name('users.update')->middleware('permission:customer_update'); # update
    Route::delete('/{id}', 'Customers\CustomerController@destroy')->name('users.remove')->middleware('permission:customer_delete'); # remove
});

/*-----------------------------stores-------------------------------------------*/
Route::group(['prefix' => 'stores/'], function () {
    Route::get('', 'Stores\StoreController@index')->name('store.index')->middleware('permission:store_list'); # index
    Route::get('create', 'Stores\StoreController@create')->name('store.create')->middleware('permission:store_create'); # create
    Route::post('store', 'Stores\StoreController@store')->name('store.store')->middleware('permission:store_create'); # store
     Route::get('/{id}', 'Stores\StoreController@show')->name('store.show')->middleware('permission:store_read'); # show
    Route::get('/activate/{id}', 'Stores\StoreController@activate')->name('store.activate');
    Route::get('/deactivate/{id}', 'Stores\StoreController@deactivate')->name('store.deactivate');

    // store Categories

    Route::get('/categories/', 'Stores\StoreCategoryController@index')->name('stores.categories.index')->middleware('permission:store_list'); #  index
    Route::get('/categories/create', 'Stores\StoreCategoryController@create')->name('stores.categories.create')->middleware('permission:store_create'); # create
    Route::post('/categories/store/', 'Stores\StoreCategoryController@store')->name('stores.categories.store')->middleware('permission:store_create'); # store
    Route::get('/categories/activate/{id}', 'Stores\StoreCategoryController@activate')->name('stores.categories.activate');
    Route::get('/categories/deactivate/{id}', 'Stores\StoreCategoryController@deactivate')->name('stores.categories.deactivate');

    Route::get('/categories/{id}', 'Stores\StoreCategoryController@show')->name('stores.categories.show')->middleware('permission:customer_read'); # show
    Route::post('/categories/{id}/edit', 'Stores\StoreCategoryController@edit')->name('stores.categories.edit')->middleware('permission:customer_update'); # edit
    Route::put('/categories/{id}', 'Stores\StoreCategoryController@update')->name('stores.categories.update')->middleware('permission:customer_update'); # update
    Route::delete('/categories/{id}', 'Stores\StoreCategoryController@destroy')->name('stores.categories.remove')->middleware('permission:customer_delete'); # remove

});

// store contact
Route::group(['prefix' => 'store-contact/'], function () {
    Route::get('', 'Stores\StoreContactController@index')->name('store_contact.index')->middleware('permission:store_contact_list'); # index
    Route::get('create', 'Stores\StoreContactController@create')->name('store_contact.create')->middleware('permission:store_contact_create'); # create
    Route::post('store', 'Stores\StoreContactController@store')->name('store_contact.store')->middleware('permission:store_contact_create'); # store
    Route::get('/{id}', 'Stores\StoreContactController@show')->name('store_contact.show')->middleware('permission:store_contact_read'); # show
    Route::get('/{id}/edit', 'Stores\StoreContactController@edit')->name('store_contact.edit')->middleware('permission:store_contact_update'); # edit
    Route::post('/{id}', 'Stores\StoreContactController@update')->name('store_contact.update')->middleware('permission:store_contact_update'); # update
    Route::delete('/{id}', 'Stores\StoreContactController@destroy')->name('store_contact.remove')->middleware('permission:store_contact_delete'); # remove
});

// store bank
Route::group(['prefix' => 'store-bank/'], function () {
    Route::get('', 'Stores\StoreBankController@index')->name('store_bank.index')->middleware('permission:store_bank_list'); # index
    Route::get('create', 'Stores\StoreBankController@create')->name('store_bank.create')->middleware('permission:store_bank_create'); # create
    Route::post('store', 'Stores\StoreBankController@store')->name('store_bank.store')->middleware('permission:store_bank_create'); # store
    Route::get('/{id}', 'Stores\StoreBankController@show')->name('store_bank.show')->middleware('permission:store_bank_read'); # show
    Route::get('/{id}/edit', 'Stores\StoreBankController@edit')->name('store_bank.edit')->middleware('permission:store_bank_update'); # edit
    Route::post('/{id}', 'Stores\StoreBankController@update')->name('store_bank.update')->middleware('permission:store_bank_update'); # update
    Route::delete('/{id}', 'Stores\StoreBankController@destroy')->name('store_bank.remove')->middleware('permission:store_bank_delete'); # remove
});

// store account
Route::group(['prefix' => 'store-account/'], function () {
    Route::get('', 'Stores\StoreAccountController@index')->name('store_account.index')->middleware('permission:store_account_list'); # index
    Route::get('create', 'Stores\StoreAccountController@create')->name('store_account.create')->middleware('permission:store_account_create'); # create
    Route::post('store', 'Stores\StoreAccountController@store')->name('store_account.store')->middleware('permission:store_account_create'); # store
    Route::get('/{id}', 'Stores\StoreAccountController@show')->name('store_account.show')->middleware('permission:store_account_read'); # show
    Route::get('/{id}/edit', 'Stores\StoreAccountController@edit')->name('store_account.edit')->middleware('permission:store_account_update'); # edit
    Route::post('/{id}', 'Stores\StoreAccountController@update')->name('store_account.update')->middleware('permission:store_account_update'); # update
    Route::delete('/{id}', 'Stores\StoreAccountController@destroy')->name('store_account.remove')->middleware('permission:store_account_delete'); # remove
});

// store address
Route::group(['prefix' => 'store-address/'], function () {
    Route::get('', 'Stores\StoreAddressController@index')->name('store_address.index')->middleware('permission:store_address_list'); # index
    Route::get('create', 'Stores\StoreAddressController@create')->name('store_address.create')->middleware('permission:store_address_create'); # create
    Route::post('store', 'Stores\StoreAddressController@store')->name('store_address.store')->middleware('permission:store_address_create'); # store
    Route::get('/{id}/', 'Stores\StoreAddressController@show')->name('store_address.show')->middleware('permission:store_address_read'); # show
    Route::get('/{id}/edit', 'Stores\StoreAddressController@edit')->name('store_address.edit')->middleware('permission:store_address_update'); # edit
    Route::post('/{id}/', 'Stores\StoreAddressController@update')->name('store_address.update')->middleware('permission:store_address_update'); # update
    Route::delete('/{id}/', 'Stores\StoreAddressController@destroy')->name('store_address.remove')->middleware('permission:store_address_delete'); # remove
});

// packages
Route::group(['prefix' => 'package/'], function () {
    Route::get('', 'Packages\PackageController@index')->name('package.index')->middleware('permission:package_list'); # index
    Route::get('create', 'Packages\PackageController@create')->name('package.create')->middleware('permission:package_create'); # create
    Route::post('store', 'Packages\PackageController@store')->name('package.store')->middleware('permission:package_create'); # store
    Route::get('/{id}', 'Packages\PackageController@show')->name('package.show')->middleware('permission:package_read'); # show
    Route::get('/{id}/edit', 'Packages\PackageController@edit')->name('package.edit')->middleware('permission:package_update'); # edit
    Route::post('/{id}', 'Packages\PackageController@update')->name('package.update')->middleware('permission:package_update'); # update
    Route::delete('/{id}', 'Packages\PackageController@destroy')->name('package.remove')->middleware('permission:package_delete'); # remove
});


// packages Categories

Route::group(['prefix' => 'package-category/'], function () {
    Route::get('', 'Packages\PackageCategoryController@index')->name('package_category.index')->middleware('permission:package_category_list'); # index
    Route::get('create', 'Packages\PackageCategoryController@create')->name('package_category.create')->middleware('permission:package_category_create'); # create
    Route::post('store', 'Packages\PackageCategoryController@store')->name('package_category.store')->middleware('permission:package_category_category_create'); # store
    Route::get('/{id}', 'Packages\PackageCategoryController@show')->name('package_category.show')->middleware('permission:package_category_read'); # show
    Route::get('/{id}/edit', 'Packages\PackageCategoryController@edit')->name('package_category.edit')->middleware('permission:package_category_update'); # edit
    Route::post('/{id}', 'Packages\PackageCategoryController@update')->name('package_category.update')->middleware('permission:package_category_update'); # update
    Route::delete('/{id}', 'Packages\PackageCategoryController@destroy')->name('package_category.remove')->middleware('permission:package_category_delete'); # remove
});

//products
Route::group(['prefix' => 'product/'], function () {
    Route::get('', 'Products\ProductController@index')->name('product.index')->middleware('permission:product_list'); # index
    Route::get('create', 'Products\ProductController@create')->name('product.create')->middleware('permission:product_create'); # create
    Route::post('store', 'Products\ProductController@store')->name('product.store')->middleware('permission:product_create'); # store
    Route::get('/{id}', 'Products\ProductController@show')->name('product.show')->middleware('permission:product_read'); # show
    Route::get('/{id}/edit', 'Products\ProductController@edit')->name('product.edit')->middleware('permission:product_update'); # edit
    Route::post('/{id}', 'Products\ProductController@update')->name('product.update')->middleware('permission:product_update'); # update
    Route::delete('/{id}', 'Products\ProductController@destroy')->name('product.remove')->middleware('permission:product_delete'); # remove
});
// product categories
Route::group(['prefix' => 'product-category/'], function () {
    Route::get('', 'Products\ProductCategoryController@index')->name('product_category.index')->middleware('permission:product_category_list'); # index
    Route::get('create', 'Products\ProductCategoryController@create')->name('product_category.create')->middleware('permission:product_category_create'); # create
    Route::post('store', 'Products\ProductCategoryController@store')->name('product_category.store')->middleware('permission:product_category_create'); # store
    Route::get('/{id}', 'Products\ProductCategoryController@show')->name('product_category.show')->middleware('permission:product_category_read'); # show
    Route::get('/{id}/edit', 'Products\ProductCategoryController@edit')->name('product_category.edit')->middleware('permission:product_category_update'); # edit
    Route::post('/{id}', 'Products\ProductCategoryController@update')->name('product_category.update')->middleware('permission:product_category_update'); # update
    Route::delete('/{id}', 'Products\ProductCategoryController@destroy')->name('product_category.remove')->middleware('permission:product_category_delete'); # remove
});
// product subcategories
Route::group(['prefix' => 'product-sub-category/'], function () {
    Route::get('', 'Products\ProductSubCategoryController@index')->name('product_sub_category.index')->middleware('permission:product_sub_category_list'); # index
    Route::get('create', 'Products\ProductSubCategoryController@create')->name('product_sub_category.create')->middleware('permission:product_sub_category_create'); # create
    Route::post('store', 'Products\ProductSubCategoryController@store')->name('product_sub_category.store')->middleware('permission:product_sub_category_create'); # store
    Route::get('/{id}', 'Products\ProductSubCategoryController@show')->name('product_sub_category.show')->middleware('permission:product_sub_category_read'); # show
    Route::get('/{id}/edit', 'Products\ProductSubCategoryController@edit')->name('product_sub_category.edit')->middleware('permission:product_sub_category_update'); # edit
    Route::post('/{id}', 'Products\ProductSubCategoryController@update')->name('product_sub_category.update')->middleware('permission:product_sub_category_update'); # update
    Route::delete('/{id}', 'Products\ProductSubCategoryController@destroy')->name('product_sub_category.remove')->middleware('permission:product_sub_category_delete'); # remove
});

// product brands
Route::group(['prefix' => 'product-brand/'], function () {
    Route::get('', 'Products\ProductBrandController@index')->name('product_brand.index')->middleware('permission:product_brand_list'); # index
    Route::get('create', 'Products\ProductBrandController@create')->name('product_brand.create')->middleware('permission:product_brand_create'); # create
    Route::post('store', 'Products\ProductBrandController@store')->name('product_brand.store')->middleware('permission:product_brand_create'); # store
    Route::get('/{id}', 'Products\ProductBrandController@show')->name('product_brand.show')->middleware('permission:product_brand_read'); # show
    Route::get('/{id}/edit', 'Products\ProductBrandController@edit')->name('product_brand.edit')->middleware('permission:product_brand_update'); # edit
    Route::post('/{id}', 'Products\ProductBrandController@update')->name('product_brand.update')->middleware('permission:product_brand_update'); # update
    Route::delete('/{id}', 'Products\ProductBrandController@destroy')->name('product_brand.remove')->middleware('permission:product_brand_delete'); # remove
});

// product colours
Route::group(['prefix' => 'product-color/'], function () {
    Route::get('', 'Products\ProductColorController@index')->name('product_color.index')->middleware('permission:product_color_list'); # index
    Route::get('create', 'Products\ProductColorController@create')->name('product_color.create')->middleware('permission:product_color_create'); # create
    Route::post('store', 'Products\ProductColorController@store')->name('product_color.store')->middleware('permission:product_color_create'); # store
    Route::get('/{id}', 'Products\ProductColorController@show')->name('product_color.show')->middleware('permission:product_color_read'); # show
    Route::get('/{id}/edit', 'Products\ProductColorController@edit')->name('product_color.edit')->middleware('permission:product_color_update'); # edit
    Route::post('/{id}', 'Products\ProductColorController@update')->name('product_color.update')->middleware('permission:product_color_update'); # update
    Route::delete('/{id}', 'Products\ProductColorController@destroy')->name('product_color.remove')->middleware('permission:product_color_delete'); # remove
});

// projects

Route::group(['prefix' => 'project/'], function () {
    Route::get('', 'Projects\ProjectController@index')->name('project.index')->middleware('permission:project_list'); # index
    Route::get('create', 'Projects\ProjectController@create')->name('project.create')->middleware('permission:project_create'); # create
    Route::post('store', 'Projects\ProjectController@store')->name('project.store')->middleware('permission:project_create'); # store
    Route::get('/{id}', 'Projects\ProjectController@show')->name('project.show')->middleware('permission:project_read'); # show
    Route::get('/{id}/edit', 'Projects\ProjectController@edit')->name('project.edit')->middleware('permission:project_update'); # edit
    Route::post('/{id}', 'Projects\ProjectController@update')->name('project.update')->middleware('permission:project_update'); # update
    Route::delete('/{id}', 'Projects\ProjectController@destroy')->name('project.remove')->middleware('permission:project_delete'); # remove
});

// product categories
Route::group(['prefix' => 'project-category/'], function () {
    Route::get('', 'Projects\ProjectCategoryController@index')->name('project_category.index')->middleware('permission:project_category_list'); # index
    Route::get('create', 'Projects\ProjectCategoryController@create')->name('project_category.create')->middleware('permission:project_category_create'); # create
    Route::post('store', 'Projects\ProjectCategoryController@store')->name('project_category.store')->middleware('permission:project_category_create'); # store
    Route::get('/{id}', 'Projects\ProjectCategoryController@show')->name('project_category.show')->middleware('permission:project_category_read'); # show
    Route::get('/{id}/edit', 'Projects\ProjectCategoryController@edit')->name('project_category.edit')->middleware('permission:project_category_update'); # edit
    Route::post('/{id}', 'Projects\ProjectCategoryController@update')->name('project_category.update')->middleware('permission:project_category_update'); # update
    Route::delete('/{id}', 'Projects\ProjectCategoryController@destroy')->name('project_category.remove')->middleware('permission:project_category_delete'); # remove
});
// project subcategories
Route::group(['prefix' => 'project-sub-category/'], function () {
    Route::get('create', 'Projects\ProjectSubCategoryController@create')->name('project_sub_category.create')->middleware('permission:project_sub_category_create'); # create
    Route::get('', 'Projects\ProjectSubCategoryController@index')->name('project_sub_category.index')->middleware('permission:project_sub_category_list'); # index
    Route::get('create', 'Projects\ProjectSubCategoryController@create')->name('project_sub_category.create')->middleware('permission:project_sub_category_create'); # create
    Route::get('create', 'Projects\ProjectSubCategoryController@create')->name('project_sub_category.create')->middleware('permission:project_sub_category_create'); # create
    Route::post('store', 'Projects\ProjectSubCategoryController@store')->name('project_sub_category.store')->middleware('permission:project_sub_category_create'); # store
    Route::get('/{id}', 'Projects\ProjectSubCategoryController@show')->name('project_sub_category.show')->middleware('permission:project_sub_category_read'); # show
    Route::get('/{id}/edit', 'Projects\ProjectSubCategoryController@edit')->name('project_sub_category.edit')->middleware('permission:project_sub_category_update'); # edit
    Route::post('/{id}', 'Projects\ProjectSubCategoryController@update')->name('project_sub_category.update')->middleware('permission:project_sub_category_update'); # update
    Route::delete('/{id}', 'Projects\ProjectSubCategoryController@destroy')->name('project_sub_category.remove')->middleware('permission:project_sub_category_delete'); # remove
});

// employees

Route::group(['prefix' => 'employees/'], function () {
    Route::get('', 'Employees\EmployeeController@index')->name('employees.index')->middleware('permission:employee_list'); # index
    Route::get('create', 'Employees\EmployeeController@create')->name('employees.create')->middleware('permission:employee_create'); # create
    Route::post('store', 'Employees\EmployeeController@store')->name('employees.store')->middleware('permission:employee_create'); # store
    Route::get('/{id}', 'Employees\EmployeeController@show')->name('employees.show')->middleware('permission:employee_read'); # show
    Route::get('/{id}/edit', 'Employees\EmployeeController@edit')->name('employee.edit')->middleware('permission:employee_update'); # edit
    Route::post('/{id}', 'Employees\EmployeeController@update')->name('employee.update')->middleware('permission:employee_update'); # update
    Route::delete('/{id}', 'Employees\EmployeeController@destroy')->name('employee.remove')->middleware('permission:employee_delete'); # remove
});
//about us Page
Route::group(['prefix' => 'about-us-page/'], function () {
    Route::get('', 'Admin\Aboutus\AboutUsController@index')->name('about_us.index')->middleware('permission:about_page_list'); # index
    Route::get('create', 'Admin\Aboutus\AboutUsController@create')->name('about_us.create')->middleware('permission:about_page_create'); # create
    Route::post('/store', 'Admin\Aboutus\AboutUsController@store')->name('about_us.store')->middleware('permission:about_page_create'); # store
    Route::get('/{id}', 'Admin\Aboutus\AboutUsController@show')->name('about_us.show')->middleware('permission:about_page_read'); # show
    Route::get('/{id}/edit', 'Admin\Aboutus\AboutUsController@edit')->name('about_us.edit')->middleware('permission:about_page_update'); # edit
    Route::post('/{id}', 'Admin\Aboutus\AboutUsController@update')->name('about_us.update')->middleware('permission:about_page_update'); # update
    Route::delete('/{id}', 'Admin\Aboutus\AboutUsController@destroy')->name('about_us.remove')->middleware('permission:about_page_delete'); # remove
});

// teams

Route::group(['prefix' => 'teams/'], function () {
    Route::get('', 'Teams\TeamController@index')->name('team.index')->middleware('permission:team_list'); # index
    Route::get('create', 'Teams\TeamController@create')->name('team.create')->middleware('permission:team_create'); # create
    Route::post('/store', 'Teams\TeamController@store')->name('team.store')->middleware('permission:team_create'); # store
    Route::get('/{id}', 'Teams\TeamController@show')->name('team.show')->middleware('permission:team_read'); # show
    Route::get('/{id}/edit', 'Teams\TeamController@edit')->name('team.edit')->middleware('permission:team_update'); # edit
    Route::post('/{id}', 'Teams\TeamController@update')->name('team.update')->middleware('permission:team_update'); # update
    Route::delete('/{id}', 'Teams\TeamController@destroy')->name('team.remove')->middleware('permission:team_delete'); # remove
});

// skills

Route::group(['prefix' => 'skill/'], function () {
    Route::get('', 'Skills\SkillController@index')->name('skill.index')->middleware('permission:skill_list'); # index
    Route::get('create', 'Skills\SkillController@create')->name('skill.create')->middleware('permission:skill_create'); # create
    Route::post('store', 'Skills\SkillController@store')->name('skill.store')->middleware('permission:skill_create'); # store
    Route::get('/{id}', 'Skills\SkillController@show')->name('skill.show')->middleware('permission:skill_read'); # show
    Route::get('/{id}/edit', 'Skills\SkillController@edit')->name('skill.edit')->middleware('permission:skill_update'); # edit
    Route::post('/{id}', 'Skills\SkillController@update')->name('skill.update')->middleware('permission:skill_update'); # update
    Route::delete('/{id}', 'Skills\SkillController@destroy')->name('skill.remove')->middleware('permission:skill_delete'); # remove
});

// skill Types

Route::group(['prefix' => 'skills/types/'], function () {
    Route::get('', 'Skills\SkillTypeController@index')->name('skills.types.index')->middleware('permission:skill_type_list'); # index
    Route::get('/create', 'Skills\SkillTypeController@create')->name('skills.types.create')->middleware('permission:skill_type_create'); # create
    Route::post('store', 'Skills\SkillTypeController@store')->name('skills.types.store')->middleware('permission:skill_type_create'); # store
    Route::get('/{id}', 'Skills\SkillTypeController@show')->name('skills.types.show')->middleware('permission:skill_type_read'); # show
    Route::get('/{id}/edit', 'Skills\SkillTypeController@edit')->name('skills.types.edit')->middleware('permission:skill_type_update'); # edit
    Route::post('/{id}', 'Skills\SkillTypeController@update')->name('skills.types.update')->middleware('permission:skill_type_update'); # update
    Route::delete('/{id}', 'Skills\SkillTypeController@destroy')->name('skills.types.remove')->middleware('permission:skill_type_delete'); # remove
});

// departments

Route::group(['prefix' => 'departments/'], function () {
    Route::get('', 'Department\DepartmentController@index')->name('departments.index')->middleware('permission:department_list'); # index
    Route::get('/create', 'Department\DepartmentController@create')->name('departments.create')->middleware('permission:department_create'); # create
    Route::post('store', 'Department\DepartmentController@store')->name('departments.store')->middleware('permission:department_create'); # store
    Route::get('/{id}', 'Department\DepartmentController@show')->name('departments.show')->middleware('permission:department_read'); # show
    Route::get('/{id}/edit', 'Department\DepartmentController@edit')->name('departments.edit')->middleware('permission:department_update'); # edit
    Route::post('/{id}', 'Department\DepartmentController@update')->name('departments.update')->middleware('permission:department_update'); # update
    Route::delete('/{id}', 'Department\DepartmentController@destroy')->name('departments.remove')->middleware('permission:department_delete'); # remove
});

Route::group(['prefix' => 'faq'], function () {
    Route::get('', 'Faqs\FaqController@index')->name('faq.index')->middleware('permission:faq_list'); # index
    Route::get('/create', 'Faqs\FaqController@create')->name('faq.create')->middleware('permission:faq_create'); # create
    Route::post('/store/', 'Faqs\FaqController@store')->name('faq.store')->middleware('permission:faq_create'); # store
    Route::get('/{id}', 'Faqs\FaqController@show')->name('faq.show')->middleware('permission:faq_read'); # show
    Route::get('/{id}/edit', 'Faqs\FaqController@edit')->name('faq.edit')->middleware('permission:faq_update'); # edit
    Route::post('/{id}', 'Faqs\FaqController@update')->name('faq.update')->middleware('permission:faq_update'); # update
    Route::delete('/{id}', 'Faqs\FaqController@destroy')->name('faq.remove')->middleware('permission:faq_delete'); # remove

    // faq categories
});
Route::group(['prefix' => 'faq-category/'], function () {
    Route::get('', 'Faqs\FaqCategoryController@index')->name('faq_category.index')->middleware('permission:faq_category_list'); # index
    Route::get('create', 'Faqs\FaqCategoryController@create')->name('faq_category.create')->middleware('permission:faq_category_create'); # create
    Route::post('store', 'Faqs\FaqCategoryController@store')->name('faq_category.store')->middleware('permission:faq_category_create'); # store
    Route::get('{id}', 'Faqs\FaqCategoryController@show')->name('faq_category.show')->middleware('permission:faq_category_read'); # show
    Route::get('{id}/edit', 'Faqs\FaqCategoryController@edit')->name('faq_category.edit')->middleware('permission:faq_category_update'); # edit
    Route::post('{id}', 'Faqs\FaqCategoryController@update')->name('faq_category.update')->middleware('permission:faq_category_update'); # update
    Route::delete('{id}', 'Faqs\FaqCategoryController@destroy')->name('faq_category.remove')->middleware('permission:faq_category_delete'); # remove
});

// services

Route::group(['prefix' => 'service/'], function () {
    Route::get('', 'Services\ServiceController@index')->name('service.index')->middleware('permission:service_list'); # index
    Route::get('create', 'Services\ServiceController@create')->name('service.create')->middleware('permission:service_create'); # create
    Route::post('store', 'Services\ServiceController@store')->name('service.store')->middleware('permission:service_create'); # store
    Route::get('{id}', 'Services\ServiceController@show')->name('service.show')->middleware('permission:service_read'); # show
    Route::get('{id}/edit', 'Services\ServiceController@edit')->name('service.edit')->middleware('permission:service_update'); # edit
    Route::post('{id}', 'Services\ServiceController@update')->name('service.update')->middleware('permission:service_update'); # update
    Route::post('{id}/delete', 'Services\ServiceController@destroy')->name('service.delete')->middleware('permission:service_delete'); # remove
});
Route::group(['prefix' => 'service-category/'], function () {
    Route::get('', 'Services\ServiceCategoryController@index')->name('service_category.index')->middleware('permission:service_category_list'); # index
    Route::get('create', 'Services\ServiceCategoryController@create')->name('service_category.create')->middleware('permission:service_category_create'); # create
    Route::post('store', 'Services\ServiceCategoryController@store')->name('service_category.store')->middleware('permission:service_category_create'); # store
    Route::get('/{id}', 'Services\ServiceCategoryController@show')->name('service_category.show')->middleware('permission:service_category_read'); # show
    Route::get('/{id}/edit', 'Services\ServiceCategoryController@edit')->name('service_category.edit')->middleware('permission:service_category_update'); # edit
    Route::post('/{id}', 'Services\ServiceCategoryController@update')->name('service_category.update')->middleware('permission:service_category_update'); # update
    Route::delete('/{id}', 'Services\ServiceCategoryController@destroy')->name('service_category.delete')->middleware('permission:service_category_delete'); # remove
});

// case studies

Route::group(['prefix' => 'case-study/'], function () {
    Route::get('', 'CaseStudies\CaseStudyController@index')->name('case_study.index')->middleware('permission:service_list'); # index
    Route::get('create', 'CaseStudies\CaseStudyController@create')->name('case_study.create')->middleware('permission:case_study_create'); # create
    Route::post('store', 'CaseStudies\CaseStudyController@store')->name('case_study.store')->middleware('permission:case_study_create'); # store
    Route::get('/{id}', 'CaseStudies\CaseStudyController@show')->name('case_study.show')->middleware('permission:service_read'); # show
    Route::get('/{id}/edit', 'CaseStudies\CaseStudyController@edit')->name('case_study.edit')->middleware('permission:case_study_update'); # edit
    Route::post('/{id}', 'CaseStudies\CaseStudyController@update')->name('case_study.update')->middleware('permission:case_study_update'); # update
    Route::delete('/{id}', 'CaseStudies\CaseStudyController@destroy')->name('case_study.remove')->middleware('permission:case_study_delete'); # remove

    Route::get('categories/', 'CaseStudies\Categories\CaseStudyCategoryController@index')->name('case_study_category.index')->middleware('permission:case_study_category_list'); # index
    Route::get('category/create', 'CaseStudies\Categories\CaseStudyCategoryController@create')->name('case_study_category.create')->middleware('permission:case_study_category_create'); # create
    Route::post('category/store', 'CaseStudies\Categories\CaseStudyCategoryController@store')->name('case_study_category.store')->middleware('permission:case_study_category_create'); # store
    Route::get('category/{id}', 'CaseStudies\Categories\CaseStudyCategoryController@show')->name('case_study_category.show')->middleware('permission:case_study_category_read'); # show
    Route::get('category/{id}/edit', 'CaseStudies\Categories\CaseStudyCategoryController@edit')->name('case_study_category.edit')->middleware('permission:case_study_category_update'); # edit
    Route::post('category/{id}', 'CaseStudies\Categories\CaseStudyCategoryController@update')->name('case_study_category.update')->middleware('permission:case_study_category_update'); # update
    Route::delete('category/{id}', 'CaseStudies\Categories\CaseStudyCategoryController@destroy')->name('case_study_category.remove')->middleware('permission:case_study_category_delete'); # remove
});
//blog
Route::group(['prefix' => 'blog/'], function () {
    Route::get('', 'Blogs\BlogController@index')->name('blog.index')->middleware('permission:blog_list'); #index
    Route::get('create', 'Blogs\BlogController@create')->name('blog.create')->middleware('permission:blog_create'); #create
    Route::post('store', 'Blogs\BlogController@store')->name('blog.store')->middleware('permission:blog_create'); #store
    Route::get('/{id}', 'Blogs\BlogController@show')->name('blog.show')->middleware('permission:blog_read'); #show
    Route::get('/{id}/edit', 'Blogs\BlogController@edit')->name('blog.edit')->middleware('permission:blog_edit'); #edit
    Route::post('/{id}', 'Blogs\BlogController@update')->name('blog.update')->middleware('permission:blog_update'); #update
    Route::delete('/{id}', 'Blogs\BlogController@delete')->name('blog.delete')->middleware('permission:blog_delete'); #delete
});
Route::group(['prefix' => 'blog-categories/'], function () {
    Route::get('', 'Blogs\BlogCategoryController@index')->name('blog_category.index')->middleware('permission:blog_category_list'); #index
    Route::get('create', 'Blogs\BlogCategoryController@create')->name('blog_category.create')->middleware('permission:blog_category_create'); #create
    Route::post('store', 'Blogs\BlogCategoryController@store')->name('blog_category.store')->middleware('permission:blog_category_create'); #store
    Route::get('/{id}', 'Blogs\BlogCategoryController@show')->name('blog_category.show')->middleware('permission:blog_category_show'); #show
    Route::get('/{id}/edit', 'Blogs\BlogCategoryController@edit')->name('blog_category.edit')->middleware('permission:blog_category_edit'); #edit
    Route::post('/{id}', 'Blogs\BlogCategoryController@update')->name('blog_category.update')->middleware('permission:blog_category_update'); #update
    Route::delete('/{id}', 'Blogs\BlogCategoryController@delete')->name('blog_category.delete')->middleware('permission:blog_category_delete'); #delete

    Route::get('comment/{id}/comment', 'Blogs\CommentController@comment')->name('blog.comment')->middleware('permission:blog_comment'); #comment
});


// Recipes

Route::group(['prefix' => 'recipes/'], function () {
    Route::get('', 'Recipes\RecipeController@index')->name('recipe.index')->middleware('permission:recipe_list'); #index
    Route::get('create', 'Recipes\RecipeController@create')->name('recipe.create')->middleware('permission:recipe_create'); #create
    Route::post('store', 'Recipes\RecipeController@store')->name('recipe.store')->middleware('permission:recipe_create'); #store
    Route::get('/{id}', 'Recipes\RecipeController@show')->name('recipe.show')->middleware('permission:recipe_read'); #show
    Route::get('/{id}/edit', 'Recipes\RecipeController@edit')->name('recipe.edit')->middleware('permission:recipe_edit'); #edit
    Route::post('/{id}', 'Recipes\RecipeController@update')->name('recipe.update')->middleware('permission:recipe_update'); #update
    Route::delete('/{id}', 'Recipes\RecipeController@delete')->name('recipe.delete')->middleware('permission:recipe_delete'); #delete
});
Route::group(['prefix' => 'recipe-category/'], function () {
    Route::get('', 'Recipes\RecipeCategoryController@index')->name('recipe_category.index')->middleware('permission:recipe_category_list'); #index
    Route::get('create', 'Recipes\RecipeCategoryController@create')->name('recipe_category.create')->middleware('permission:recipe_category_create'); #create
    Route::post('store', 'Recipes\RecipeCategoryController@store')->name('recipe_category.store')->middleware('permission:recipe_category_create'); #store
    Route::get('/{id}', 'Recipes\RecipeCategoryController@show')->name('recipe_category.show')->middleware('permission:recipe_category_show'); #show
    Route::get('/{id}/edit', 'Recipes\RecipeCategoryController@edit')->name('recipe_category.edit')->middleware('permission:recipe_category_edit'); #edit
    Route::post('/{id}', 'Recipes\RecipeCategoryController@update')->name('recipe_category.update')->middleware('permission:recipe_category_update'); #update
    Route::delete('/{id}', 'Recipes\RecipeCategoryController@delete')->name('recipe_category.delete')->middleware('permission:recipe_category_delete'); #delete

});
// methods
Route::group(['prefix' => 'recipe-methods/'], function () {
    Route::get('', 'Recipes\RecipeMethodController@index')->name('recipe_method.index')->middleware('permission:recipe_method_list'); #index
    Route::get('create', 'Recipes\RecipeMethodController@create')->name('recipe_method.create')->middleware('permission:recipe_method_create'); #create
    Route::post('store', 'Recipes\RecipeMethodController@store')->name('recipe_method.store')->middleware('permission:recipe_method_create'); #store
    Route::get('/{id}', 'Recipes\RecipeMethodController@show')->name('recipe_method.show')->middleware('permission:recipe_method_show'); #show
    Route::get('/{id}/edit', 'Recipes\RecipeMethodController@edit')->name('recipe_method.edit')->middleware('permission:recipe_method_edit'); #edit
    Route::post('/{id}', 'Recipes\RecipeMethodController@update')->name('recipe_method.update')->middleware('permission:recipe_method_update'); #update
    Route::delete('/{id}', 'Recipes\RecipeMethodController@delete')->name('recipe_method.delete')->middleware('permission:recipe_method_delete'); #delete

});
// ingredients
Route::group(['prefix' => 'recipe-ingredients/'], function () {
    Route::get('', 'Recipes\RecipeIngredientController@index')->name('recipe_ingredient.index')->middleware('permission:recipe_ingredient_list'); #index
    Route::get('create', 'Recipes\RecipeIngredientController@create')->name('recipe_ingredient.create')->middleware('permission:recipe_ingredient_create'); #create
    Route::post('store', 'Recipes\RecipeIngredientController@store')->name('recipe_ingredient.store')->middleware('permission:recipe_ingredient_create'); #store
    Route::get('/{id}', 'Recipes\RecipeIngredientController@show')->name('recipe_ingredient.show')->middleware('permission:recipe_ingredient_show'); #show
    Route::get('/{id}/edit', 'Recipes\RecipeIngredientController@edit')->name('recipe_ingredient.edit')->middleware('permission:recipe_ingredient_edit'); #edit
    Route::post('/{id}', 'Recipes\RecipeIngredientController@update')->name('recipe_ingredient.update')->middleware('permission:recipe_ingredient_update'); #update
    Route::delete('/{id}', 'Recipes\RecipeIngredientController@delete')->name('recipe_ingredient.delete')->middleware('permission:recipe_ingredient_delete'); #delete

});
// bookings

Route::group(['prefix' => 'booking'], function () {
    Route::get('', 'Bookings\BookingController@index')->name('booking.index')->middleware('permission:booking_list'); # index
    Route::get('/create', 'Bookings\BookingController@create')->name('booking.create')->middleware('permission:booking_create'); # create
    Route::post('/store/', 'Bookings\BookingController@store')->name('booking.store')->middleware('permission:booking_create'); # store
    Route::get('/{id}', 'Bookings\BookingController@show')->name('booking.show')->middleware('permission:booking_read'); # show
    Route::get('/{id}/edit', 'Bookings\BookingController@edit')->name('booking.edit')->middleware('permission:booking_update'); # edit
    Route::post('/{id}', 'Bookings\BookingController@update')->name('booking.update')->middleware('permission:booking_update'); # update
    Route::delete('/{id}', 'Bookings\BookingController@destroy')->name('booking.remove')->middleware('permission:booking_delete'); # remove

    // booking categories
});
Route::group(['prefix' => 'booking-category/'], function () {
    Route::get('', 'Bookings\BookingCategoryController@index')->name('booking_category.index')->middleware('permission:booking_category_list'); # index
    Route::get('create', 'Bookings\BookingCategoryController@create')->name('booking_category.create')->middleware('permission:booking_category_create'); # create
    Route::post('store', 'Bookings\BookingCategoryController@store')->name('booking_category.store')->middleware('permission:booking_category_create'); # store
    Route::get('{id}', 'Bookings\BookingCategoryController@show')->name('booking_category.show')->middleware('permission:booking_category_read'); # show
    Route::get('{id}/edit', 'Bookings\BookingCategoryController@edit')->name('booking_category.edit')->middleware('permission:booking_category_update'); # edit
    Route::post('{id}', 'Bookings\BookingCategoryController@update')->name('booking_category.update')->middleware('permission:booking_category_update'); # update
    Route::delete('{id}', 'Bookings\BookingCategoryController@destroy')->name('booking_category.remove')->middleware('permission:booking_category_delete'); # remove
});
// event
Route::group(['prefix' => 'event'], function () {
    Route::get('', 'Bookings\EventsController@index')->name('booking_event.index')->middleware('permission:booking_event_list'); # index
    Route::get('create', 'Bookings\EventsController@create')->name('booking_event.create')->middleware('permission:booking_event_create'); # create
    Route::post('store', 'Bookings\EventsController@store')->name('booking_event.store')->middleware('permission:booking_event_create'); # store
    Route::get('{id}', 'Bookings\EventsController@show')->name('booking_event.show')->middleware('permission:booking_event_read'); # show
    Route::get('/{id}/edit', 'Bookings\EventsController@edit')->name('booking_event.edit')->middleware('permission:booking_event_update'); # edit
    Route::post('/{id}', 'Bookings\EventsController@update')->name('booking_event.update')->middleware('permission:booking_event_update'); # update
    Route::delete('/{id}', 'Bookings\EventsController@destroy')->name('booking_event.remove')->middleware('permission:booking_event_delete'); # remove
});
// venue
Route::group(['prefix' => 'venue'], function () {
    Route::get('', 'Bookings\VenuesController@index')->name('booking_venue.index')->middleware('permission:booking_venue_list'); # index
    Route::get('/create', 'Bookings\VenuesController@create')->name('booking_venue.create')->middleware('permission:booking_venue_create'); # create
    Route::post('/store', 'Bookings\VenuesController@store')->name('booking_venue.store')->middleware('permission:booking_venue_create'); # store
    Route::get('/{id}', 'Bookings\VenuesController@show')->name('booking_venue.show')->middleware('permission:booking_venue_read'); # show
    Route::get('/{id}/edit', 'Bookings\VenuesController@edit')->name('booking_venue.edit')->middleware('permission:booking_venue_update'); # edit
    Route::post('/{id}', 'Bookings\VenuesController@update')->name('booking_venue.update')->middleware('permission:booking_venue_update'); # update
    Route::delete('/{id}', 'Bookings\VenuesController@destroy')->name('booking_venue.remove')->middleware('permission:booking_venue_delete'); # remove
});

// front end urls

Route::group(['prefix' => 'home/'], function () {
    Route::get('', 'HomeController@index')->name('home.index'); #index
});

Route::group(['prefix' => 'our-case-studies/'], function () {
    Route::get('', 'Web\CaseStudies\WebCaseStudyController@index')->name('web_case_study.index'); #index
    Route::get('/{id}', 'Web\CaseStudies\WebCaseStudyController@show')->name('web_case_study.show'); #show
});

Route::group(['prefix' => 'case-study-categories/'], function () {
    Route::get('', 'Web\CaseStudies\CaseStudyCategoryController@index')->name('web_case_study_category.index'); #index
    Route::get('{id}', 'Web\CaseStudies\CaseStudyCategoryController@show')->name('web_case_study_category.show'); #show
});

Route::group(['prefix' => 'blog-articles/'], function () {
    Route::get('', 'Web\blogs\WebBlogController@index')->name('web_blog.index'); #index
    Route::get('/{id}', 'Web\blogs\WebBlogController@show')->name('web_blog.show'); #show
    Route::get('/category/{id}', 'Web\blogs\WebBlogController@showAllBlogByCategory')->name('web_blog_by_Category.show'); #show

});

Route::group(['prefix' => 'blog-comment'], function () {
    Route::get('{id}/comment', 'Web\blogs\WebBlogController@comment')->name('web_blog_comment.comment'); #show
    Route::post('/store', 'Web\Blogs\Comments\CommentBlogController@store')->name('web_blog_comment.store'); #store
    Route::get('comment/{id}', 'Web\Blogs\Comments\CommentBlogController@show')->name('web_blog_comment.show'); #store

});

Route::get('{id}/comments', 'Web\blogs\WebBlogController@loadModal')->name('web_blog_comment.commentModal'); #show

Route::group(['prefix' => 'blog-category/'], function () {
    Route::get('', 'Web\blogs\WebBlogCategoryController@index')->name('web_blog_category.index'); #index
    Route::get('/{id}', 'Web\blogs\WebBlogCategoryController@show')->name('web_blog_category.show'); #show
    // Route::get('/category/{id}', 'Web\blogs\WebBlogController@showAllBlogByCategory')->name('web_blog_category.showByCategory'); #show

});

Route::group(['prefix' => 'our-services/'], function () {
    Route::get('', 'Web\Services\WebServiceController@index')->name('web_service.index'); #index
    Route::get('/{id}', 'Web\Services\WebServiceController@show')->name('web_service.show'); #show
});

Route::group(['prefix' => 'service-categories/'], function () {
    Route::get('', 'Web\Services\ServiceCategoryController@index')->name('web_service_category.index'); # index
    Route::get('/{id}', 'Web\Services\ServiceCategoryController@show')->name('web_service_category.show'); # show
});

Route::group(['prefix' => 'about-us/'], function () {
    Route::get('', 'Web\AboutUs\WebAboutUsController@index')->name('web_about_us.index'); #index
    Route::get('/{id}', 'Web\AboutUs\WebAboutUsController@show')->name('web_about_us.show'); #show
});

Route::group(['prefix' => 'contact-us/'], function () {
    Route::get('', 'Web\ContactUs\WebContactUsController@index')->name('web_contact_us.index'); #index
    Route::post('store', 'Web\ContactUs\WebContactUsController@store')->name('web_contact_us.store'); #index

    Route::get('/{id}', 'Web\ContactUs\WebContactUsController@show')->name('web_contact_us.show'); #show
});

Route::group(['prefix' => 'our-events/'], function () {
    Route::get('', 'Web\Events\WebEventsController@index')->name('web_event.index'); #index
    Route::get('/{id}', 'Web\Events\WebEventsController@show')->name('web_event.show'); #show
    Route::get('{id}/booking', 'Web\Events\WebEventsController@CreateBooking')->name('web_event_book.booking'); #show
    Route::post('store', 'Web\Booking\WebBookingController@store')->name('web_booking.store'); #create a booking

});

Route::group(['prefix' => 'frequently-asked-questions/'], function () {
    Route::get('', 'Web\Faqs\WebFaqController@index')->name('web_faq.index'); #index
    Route::get('/{id}', 'Web\Faqs\WebFaqController@show')->name('web_faq.show'); #show
});

Route::group(['prefix' => 'frequently-asked-questions-categories/'], function () {
    Route::get('', 'Web\Faqs\FaqCategoryController@index')->name('web_faq_category.index'); #index
    Route::get('/{id}', 'Web\Faqs\FaqCategoryController@show')->name('web_faq_category.show'); #show
});

Route::group(['prefix' => 'our-recipes/'], function () {
    Route::get('', 'Web\Recipes\WebRecipeController@index')->name('web_recipe.index'); #index
    Route::get('/{id}', 'Web\Recipes\WebRecipeController@show')->name('web_recipe.show'); #show
    Route::get('/category/{id}', 'Web\Recipes\RecipesController@showAllRecipeByCategory')->name('web_recipe_by_Category.show'); #show
    //web_recipe_category
});

Route::group(['prefix' => 'recipe-categories/'], function () {
    Route::get('', 'Web\Recipes\WebRecipeCategoryController@index')->name('web_recipe_category.index'); #index
    Route::get('/{id}', 'Web\Recipes\WebRecipeCategoryController@show')->name('web_recipe_category.show'); #show

});

Route::group(['prefix' => 'products/'], function () {
    Route::get('', 'Web\Products\WebProductController@index')->name('web_product.index'); #index
    Route::get('/{id}', 'Web\Products\WebProductController@show')->name('web_product.show'); #show
    Route::get('/category/{id}', 'Web\Products\WebProductController@showAllProductByCategory')->name('web_prod_by_Category.show'); #show

});

Route::group(['prefix' => 'products-categories/'], function () {
    Route::get('', 'Web\Products\WebProductCategoryController@index')->name('web_product_category.index'); #index
    Route::get('/{id}', 'Web\Products\WebProductCategoryController@show')->name('web_product_category.show'); #show
    //Route::get('/category/{id}', 'Web\Products\WebProductController@productByCategory')->name('web_product_by_Category.show'); #show

});

Route::group(['prefix' => 'products-sub-categories/'], function () {
    Route::get('', 'Web\Products\WebProductSubCategoryController@index')->name('web_product_sub_category.index'); #index
    Route::get('/{id}', 'Web\Products\WebProductSubCategoryController@show')->name('web_product_sub_category.show'); #show
    //Route::get('/category/{id}', 'Web\Products\WebProductSubCategoryController@productByCategory')->name('web_product_by_sub_category.show'); #show

});
-
Route::group(['prefix' => 'our-projects/'], function () {
    Route::get('', 'Web\Projects\ProjectController@index')->name('web_project.index');
    Route::get('/{id}', 'Web\Projects\ProjectController@show')->name('web_project.show'); # show
});

Route::group(['prefix' => 'our-project-category/'], function () {
    Route::get('', 'Web\Projects\ProjectCategoryController@index')->name('web_project_category.index'); # index
    Route::get('/{id}', 'Web\Projects\ProjectCategoryController@show')->name('web_project_category.show'); # show
});

Route::group(['prefix' => 'our-team/'], function () {
    Route::get('', 'Web\Teams\TeamController@index')->name('web_team.index'); #index
    Route::get('/{id}', 'Web\Teams\TeamController@show')->name('web_team.show'); #show
    Route::get('/category/{id}', 'Web\Teams\TeamController@showAllTeamByCategory')->name('web_prod_by_Category.show'); #show

});

Route::group(['prefix' => 'the-team/'], function () {
    Route::get('', 'Web\Teams\EmployeeController@index')->name('web_employee.index'); #index
    Route::get('/{id}', 'Web\Teams\EmployeeController@show')->name('web_employee.show'); #show
    Route::get('/category/{id}', 'Web\Teams\EmployeeController@showAllTeamByCategory')->name('web_prod_by_Category.show'); #show

});
Route::group(['prefix' => 'pricing/'], function () {
    Route::get('', 'Web\Pricing\PricingController@index')->name('web_pricing.index'); #index
    Route::get('/{id}', 'Web\Pricing\PricingController@show')->name('web_pricing.show'); #show
    Route::get('/category/{id}', 'Web\Teams\EmployeeController@showAllTeamByCategory')->name('web_prod_by_Category.show'); #show

});

// web packages
Route::group(['prefix' => 'our-packages/'], function () {
    Route::get('', 'Web\Packages\PackageController@index')->name('web_package.index'); #index
    Route::get('/{id}', 'Web\Packages\PackageController@show')->name('web_package.show'); #show
    Route::get('/category/{id}', 'Web\Teams\EmployeeController@showAllTeamByCategory')->name('web_prod_by_Category.show'); #show

});

// web package categories

Route::group(['prefix' => 'our-package-categories/'], function () {
    Route::get('', 'Web\Packages\PackageCategoryController@index')->name('web_package_category.index'); #index
    Route::get('/{id}', 'Web\Packages\PackageCategoryController@show')->name('web_package_category.show'); #show

});