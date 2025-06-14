<?php

use Illuminate\Support\Facades\Route;

// Authentication admin Login Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('login', 'Auth\LoginController@login')->name('admin.postlogin');
Route::get('logout/{id?}', 'Auth\LoginController@logout')->name('admin.logout');

//forget and reset password
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.auth.password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.passwordemail');
Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm')->name('admin.auth.password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('admin.resetpassword');

//Dashboard Route....
Route::get('/', 'AdminController@index')->name('admin.dashboard');
Route::get('/manage-profile', 'AdminController@editProfile')->name('admin.profile');
Route::post('/edit-profile', 'AdminController@updateProfile')->name('admin.updateProfile');

Route::group(['prefix' => 'user'], function () {
    Route::get('/create', 'VendorController@create')->name('admin.vendor.create');
    Route::post('/createPost', 'VendorController@createPost')->name('admin.vendor.createPost');

    Route::get('/list', 'VendorController@list')->name('admin.vendor.list');
    Route::get('/edit/{id}', 'VendorController@editVendor')->name('admin.vendor.edit');
    Route::post('/update', 'VendorController@updateVenderInventory')->name('admin.vendor.inventory.update');
    Route::get('/filter', 'VendorController@inventoryVendor')->name('admin.vendor.filter');
    Route::get('/delete/{id}', 'VendorController@destroy')->name('admin.vendor.delete');
    Route::post('/save-edited-vendor', 'VendorController@saveEditedVendor')->name('admin.saveEditedVendor');
    Route::post('/check-vendor-email', 'VendorController@checkVendorEmail')->name('admin.checkVendorEmail');
    Route::post('/chagne-vendor-status', 'VendorController@chagneVendorStatus')->name('admin.chagneVendorStatus');
});
Route::group(['prefix' => 'category'], function () {
    Route::match(['get', 'post'], '/list', 'CategoryController@index')->name('admin.category.list');
    Route::get('/create', 'CategoryController@create')->name('admin.category.create');
    Route::post('/store', 'CategoryController@store')->name('admin.category.store');
    Route::get('/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
    Route::post('/update', 'CategoryController@update')->name('admin.category.update');
    Route::get('/delete/{id}', 'CategoryController@destroy')->name('admin.category.delete');
    // Route::post('/check-service-name', 'CategoryController@checkServiceName')->name('admin.checkServiceName');
});

Route::group(['prefix' => 'packaging'], function () {
    Route::match(['get', 'post'], '/list', 'PackagingSlipController@index')->name('admin.packaging.list');
    Route::get('/create', 'PackagingSlipController@create')->name('admin.packaging.create');
    Route::post('/store', 'PackagingSlipController@store')->name('admin.packaging.store');
    Route::get('/edit/{id}', 'PackagingSlipController@edit')->name('admin.packaging.edit');
    Route::post('/update', 'PackagingSlipController@update')->name('admin.packaging.update');
    Route::get('/delete/{id}', 'PackagingSlipController@destroy')->name('admin.packaging.delete');
    Route::get('/download/{id}', 'PackagingSlipController@generatePdf')->name('admin.packaging.generatePdf');
    Route::get('/download/assorting/{id}', 'PackagingSlipController@assorting')->name('admin.packaging.assorting');
    // Route::post('/check-service-name', 'PackagingSlipController@checkServiceName')->name('admin.checkServiceName');
});

Route::match(['get', 'post'], '/quality/list', 'PackagingSlipController@qualitylist')->name('admin.quality.list');
Route::get('/quality/create', 'PackagingSlipController@qualitycreate')->name('admin.quality.add');
Route::post('/quality/store', 'PackagingSlipController@qualitystore')->name('admin.quality.store');
Route::get('/quality/edit/{id}', 'PackagingSlipController@editquality')->name('admin.quality.edit');
Route::post('/quality/edit/{id}', 'PackagingSlipController@updatequality')->name('admin.quality.update');
Route::get('/quality/delete/{id}', 'PackagingSlipController@deletequality')->name('admin.quality.delete');

Route::match(['get', 'post'], '/gatepass/list', 'PackagingSlipController@gatepasslist')->name('admin.gatepass.list');
Route::get('/gatepass/create', 'PackagingSlipController@gatepasscreate')->name('admin.gatepass.add');
Route::get('/gatepass/edit/{id}', 'PackagingSlipController@gatepassedit')->name('admin.gatepass.edit');
Route::post('/gatepass/edit/{id}', 'PackagingSlipController@gatepassupdate')->name('admin.gatepass.update');
Route::post('/gatepass/store', 'PackagingSlipController@gatepassstore')->name('admin.gatepass.store');
Route::get('/gatepass/download/{id}', 'PackagingSlipController@generateGatePass')->name('admin.gatepass.generateGatePass');
Route::get('/gatepass/delete/{id}', 'PackagingSlipController@deletegatepass')->name('admin.gatepass.delete');


Route::match(['get', 'post'], '/inward/list', 'PackagingSlipController@inwardlist')->name('admin.inward.list');
Route::get('/inward/create', 'PackagingSlipController@inwardcreate')->name('admin.inward.add');
Route::get('/inward/edit/{id}', 'PackagingSlipController@inwardedit')->name('admin.inward.edit');
Route::post('/inward/edit/{id}', 'PackagingSlipController@inwardupdate')->name('admin.inward.update');
Route::post('/inward/store', 'PackagingSlipController@inwardstore')->name('admin.inward.store');
Route::get('/inward/download/{id}', 'PackagingSlipController@generateinward')->name('admin.inward.inwardPass');
Route::get('/inward/delete/{id}', 'PackagingSlipController@deleteinward')->name('admin.inward.delete');

Route::match(['get', 'post'], '/sample/list', 'PackagingSlipController@samplelist')->name('admin.sample.list');
Route::get('/sample/create', 'PackagingSlipController@samplecreate')->name('admin.sample.add');
Route::get('/sample/edit/{id}', 'PackagingSlipController@sampleedit')->name('admin.sample.edit');
Route::post('/sample/edit/{id}', 'PackagingSlipController@sampleupdate')->name('admin.sample.update');
Route::post('/sample/store', 'PackagingSlipController@samplestore')->name('admin.sample.store');
Route::get('/sample/download/{id}', 'PackagingSlipController@generatesample')->name('admin.sample.samplePass');
Route::get('/sample/delete/{id}', 'PackagingSlipController@deletesample')->name('admin.sample.delete');

Route::match(['get', 'post'], '/defective/list', 'PackagingSlipController@defectivelist')->name('admin.defective.list');
Route::get('/defective/create', 'PackagingSlipController@defectivecreate')->name('admin.defective.add');
Route::get('/defective/edit/{id}', 'PackagingSlipController@defectiveedit')->name('admin.defective.edit');
Route::post('/defective/edit/{id}', 'PackagingSlipController@defectiveupdate')->name('admin.defective.update');
Route::post('/defective/store', 'PackagingSlipController@defectivestore')->name('admin.defective.store');
Route::get('/defective/download/{id}', 'PackagingSlipController@generatedefective')->name('admin.defective.defectivePass');
Route::get('/defective/delete/{id}', 'PackagingSlipController@deletedefective')->name('admin.defective.delete');

Route::match(['get', 'post'], '/warehouse/list', 'PackagingSlipController@warehouselist')->name('admin.warehouse.list');
Route::get('/warehouse/create', 'PackagingSlipController@warehousecreate')->name('admin.warehouse.add');
Route::post('/warehouse/store', 'PackagingSlipController@warehousestore')->name('admin.warehouse.store');
Route::get('/warehouse/edit/{id}', 'PackagingSlipController@editwarehouse')->name('admin.warehouse.edit');
Route::post('/warehouse/edit/{id}', 'PackagingSlipController@updatewarehouse')->name('admin.warehouse.update');
Route::get('/warehouse/delete/{id}', 'PackagingSlipController@deletewarehouse')->name('admin.warehouse.delete');




// Route::get('/hash-password', function () {
//         return Hash::make('palrechaAdmin!@#2025');
//     });


// Route::get('/hash-password', function () {
//     return Hash::make('plexpoAdmin!@#2024');
// });