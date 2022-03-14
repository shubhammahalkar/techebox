<?php

/*
  |--------------------------------------------------------------------------
  | Admin Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register admin routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::post('/update', 'UpdateController@step0')->name('update');
Route::get('/update/step1', 'UpdateController@step1')->name('update.step1');
Route::get('/update/step2', 'UpdateController@step2')->name('update.step2');

Route::get('/admin', 'AdminController@admin_dashboard')->name('admin.dashboard')->middleware(['auth', 'admin']);
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    //Update Routes

    Route::resource('categories', 'CategoryController');
    Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('categories.edit');
    Route::post('/categories/update/{id}', 'CategoryController@update')->name('categories.update');
    Route::get('/categories/config/{id}', 'CategoryController@config')->name('categories.config');
    Route::get('/categories/update_config/{id}', 'CategoryController@update_config')->name('categories.update_config');
    Route::get('/categories/destroy/{id}', 'CategoryController@destroy')->name('categories.destroy');
    Route::post('/categories/featured', 'CategoryController@updateFeatured')->name('categories.featured');
    Route::post('/categories/published', 'CategoryController@updatePublished')->name('categories.published');
    Route::post('/categories/add_product', 'CategoryController@add_products')->name('categories.add_products');

    Route::resource('subcategories', 'SubCategoryController');
    Route::get('/subcategories/edit/{id}', 'SubCategoryController@edit')->name('subcategories.edit');
    Route::post('/subcategories/edit/{id}', 'SubCategoryController@update')->name('subcategories.update');
    Route::get('/subcategories/config/{id}', 'SubCategoryController@config')->name('subcategories.config');
    Route::get('/subcategories/destroy/{id}', 'SubCategoryController@destroy')->name('subcategories.destroy');
    Route::post('/subcategories/featured', 'SubCategoryController@updateFeatured')->name('subcategories.featured');
    Route::post('/subcategories/published', 'SubCategoryController@updatePublished')->name('subcategories.published');
    Route::post('/subcategory/category', 'SubCategoryController@get_subcategories_by_category')->name('subcategories.get_subcategories_by_category');

    Route::resource('subsubcategories', 'SubSubCategoryController');
    Route::get('/subsubcategories/edit/{id}', 'SubSubCategoryController@edit')->name('subsubcategories.edit');
    Route::get('/subsubcategories/config/{id}', 'SubSubCategoryController@config')->name('subsubcategories.config');
    Route::get('/subsubcategories/destroy/{id}', 'SubSubCategoryController@destroy')->name('subsubcategories.destroy');
    Route::get('/subsubcategories/update/{id}', 'SubSubCategoryController@update')->name('subsubcategories.update');
    Route::post('/subsubcategories/featured', 'SubSubCategoryController@updateFeatured')->name('subsubcategories.featured');
    Route::post('/subsubcategories/published', 'SubSubCategoryController@updatePublished')->name('subsubcategories.published');
    Route::post('/subsubcategories/cancellation', 'SubSubCategoryController@updateCancellation')->name('subsubcategories.cancellation');
    Route::post('/subsubcategories/cod', 'SubSubCategoryController@updateCOD')->name('subsubcategories.cod');
    Route::post('/subsubcategories/on_day_delivery', 'SubSubCategoryController@updateOnDayDelivery')->name('subsubcategories.ondaydelivery');
    Route::post('/subsubcategories/brand_approval', 'SubSubCategoryController@updateBrandApproval')->name('subsubcategories.brandapproval');
    Route::post('/subsubcategories/installation', 'SubSubCategoryController@updateInstallation')->name('subsubcategories.updateinstallation');
    Route::post('/subsubcategories/dicount/update', 'SubSubCategoryController@updateDiscount')->name('subsubcategories.updatediscount');
    Route::post('/subsubcategories/shipping/update', 'SubSubCategoryController@updateShippingDays')->name('subsubcategories.updateshippingdays');
    Route::post('/subsubcategories/tax/update', 'SubSubCategoryController@updateTax')->name('subsubcategories.updatetax');
    Route::post('/subsubcategories/return_and_replacement/update', 'SubSubCategoryController@updateRandR')->name('subsubcategories.updaterandr');
    Route::post('/subsubcategories/instant_return_and_replacement/update', 'SubSubCategoryController@updateInstantRandR')->name('subsubcategories.instantupdaterandr');
    Route::post('/subsubcategories/return_and_replacement_policy/update', 'SubSubCategoryController@updateRandRPolicy')->name('subsubcategories.updaterandrpolicy');
    Route::post('/subsubcategories/additional_text/update', 'SubSubCategoryController@updateAdditionalText')->name('subsubcategories.updateadditionaltext');
    Route::post('/subsubcategories/package_method/update', 'SubSubCategoryController@updatePackageMethod')->name('subsubcategories.updatePackageMethod');
    Route::post('/subsubcategories/subcategory', 'SubSubCategoryController@get_subcategories_by_subcategory')->name('subsubcategories.get_subcategories_by_subcategory');
    Route::post('/subsubcategories/update_offers', 'SubSubCategoryController@update_offers')->name('subsubcategories.update_offers');
    Route::post('/subsubcategories/badge_update', 'SubSubCategoryController@update_badge')->name('subsubcategories.updatebadge');
    Route::post('/subsubcategories/update_commission', 'SubSubCategoryController@update_commission')->name('subsubcategories.updatecommission');
    Route::post('/subsubcategories/update_tax', 'SubSubCategoryController@update_tax')->name('subsubcategories.updatetax');
    Route::post('/subsubcategories/submit_offers/{id}', 'SubSubCategoryController@submit_offers')->name('subsubcategories.submit_offers');
    Route::post('/subsubcategories/vendor_package_guide/{id}', 'SubSubCategoryController@update_vendor_package_guide')->name('subsubcategories.vendor_package_guide');
    Route::post('/subsubcategories/delivery_boy_guide/{id}', 'SubSubCategoryController@update_delivery_boy_guide')->name('subsubcategories.delivery_boy_guide');
    Route::post('/subsubcategories/buying_guide/{id}', 'SubSubCategoryController@update_buying_guide')->name('subsubcategories.buying_guide');
    Route::post('/subsubcategories/delivery_boy_type/{id}', 'SubSubCategoryController@update_delivery_boy_type')->name('subsubcategories.delivery_boy_type');



    Route::resource('brands', 'BrandController');
    Route::get('/brands/edit/{id}', 'BrandController@edit')->name('brands.edit');
    Route::get('/brands/destroy/{id}', 'BrandController@destroy')->name('brands.destroy');
    Route::get('/brands/config/{id}', 'BrandController@config')->name('brands.config');
    Route::post('/brands/update/{id}', 'BrandController@update')->name('brands.update');
    Route::get('/brands/setting/{id}', 'BrandController@setting')->name('brands.setting');
    Route::post('/brands/update_offers', 'BrandController@update_offers')->name('brands.update_offers');
    Route::post('/brands/submit_offers/{id}', 'BrandController@submit_offers')->name('brands.submit_offers');
    Route::post('/brands/return_and_replacement/update', 'BrandController@updateRandR')->name('brands.updaterandr');
    Route::post('/brands/instant_return_and_replacement/update', 'BrandController@updateInstantRandR')->name('brands.instantupdaterandr');
    Route::post('/brands/badge_update', 'BrandController@update_badge')->name('brands.updatebadge');
    Route::post('/brands/cod', 'BrandController@updateCOD')->name('brands.cod');
    Route::post('/brands/brand_approval', 'BrandController@updateBrandApproval')->name('brands.brandapproval');
    Route::post('/brands/update_commission', 'BrandController@update_commission')->name('brands.updatecommission');
    Route::post('/brands/update_tax', 'BrandController@update_tax')->name('brands.updatetax');
    Route::post('/brands/cancellation', 'BrandController@updateCancellation')->name('brands.cancellation');
    Route::post('/brands/dicount/update', 'BrandController@updateDiscount')->name('brands.updatediscount');
    Route::post('/brands/return_and_replacement_policy/update', 'BrandController@updateRandRPolicy')->name('brands.updaterandrpolicy');
    Route::post('/brands/additional_text/update', 'BrandController@updateAdditionalText')->name('brands.updateadditionaltext');
    Route::post('/brands/buying_guide/{id}', 'BrandController@update_buying_guide')->name('brands.buying_guide');
    Route::post('/brands/published', 'BrandController@updatePublished')->name('brands.published');

    Route::get('/products/admin', 'ProductController@admin_products')->name('products.admin');
    Route::get('/products/seller', 'ProductController@seller_products')->name('products.seller');
    Route::get('/products/all', 'ProductController@all_products')->name('products.all');
    Route::get('/products/create', 'ProductController@create')->name('products.create');
    Route::get('/products/admin/{id}/edit', 'ProductController@admin_product_edit')->name('products.admin.edit');
    Route::get('/products/seller/{id}/edit', 'ProductController@seller_product_edit')->name('products.seller.edit');
    Route::post('/products/todays_deal', 'ProductController@updateTodaysDeal')->name('products.todays_deal');
    Route::post('/products/featured', 'ProductController@updateFeatured')->name('products.featured');
    Route::post('/products/approved', 'ProductController@updateProductApproval')->name('products.approved');
    Route::post('/products/get_products_by_subcategory', 'ProductController@get_products_by_subcategory')->name('products.get_products_by_subcategory');
    Route::post('/bulk-product-delete', 'ProductController@bulk_product_delete')->name('bulk-product-delete');
    Route::post('/products/product_addon', 'ProductController@product_addon')->name('products.product_addon');
    Route::get('/products/config/{id}', 'ProductController@config')->name('products.config');


    Route::post('/products/cancellation', 'ProductController@updateCancellation')->name('products.cancellation');
    Route::post('/products/cod', 'ProductController@updateCOD')->name('products.cod');
    Route::post('/products/on_day_delivery', 'ProductController@updateOnDayDelivery')->name('products.ondaydelivery');
    Route::post('/products/brand_approval', 'ProductController@updateBrandApproval')->name('products.brandapproval');
    Route::post('/products/installation', 'ProductController@updateInstallation')->name('products.updateinstallation');
    Route::post('/products/dicount/update', 'ProductController@updateDiscount')->name('products.updatediscount');
    Route::post('/products/shipping/update', 'ProductController@updateShippingDays')->name('products.updateshippingdays');
    Route::post('/products/tax/update', 'ProductController@updateTax')->name('products.updatetax');
    Route::post('/products/return_and_replacement/update', 'ProductController@updateRandR')->name('products.updaterandr');
    Route::post('/products/instant_return_and_replacement/update', 'ProductController@updateInstantRandR')->name('products.instantupdaterandr');
    Route::post('/products/return_and_replacement_policy/update', 'ProductController@updateRandRPolicy')->name('products.updaterandrpolicy');
    Route::post('/products/additional_text/update', 'ProductController@updateAdditionalText')->name('products.updateadditionaltext');
    Route::post('/products/package_method/update', 'ProductController@updatePackageMethod')->name('products.updatePackageMethod');
    Route::post('/products/subcategory', 'ProductController@get_subcategories_by_subcategory')->name('products.get_subcategories_by_subcategory');
    Route::post('/products/update_offers', 'ProductController@update_offers')->name('products.update_offers');
    Route::post('/products/badge_update', 'ProductController@update_badge')->name('products.updatebadge');
    Route::post('/products/update_commission', 'ProductController@update_commission')->name('products.updatecommission');
    Route::post('/products/update_tax', 'ProductController@update_tax')->name('products.updatetax');
    Route::post('/products/submit_offers/{id}', 'ProductController@submit_offers')->name('products.submit_offers');
    Route::post('/products/vendor_package_guide/{id}', 'ProductController@update_vendor_package_guide')->name('products.vendor_package_guide');
    Route::post('/products/delivery_boy_guide/{id}', 'ProductController@update_delivery_boy_guide')->name('products.delivery_boy_guide');
    Route::post('/products/buying_guide/{id}', 'ProductController@update_buying_guide')->name('products.buying_guide');
    Route::post('/products/delivery_boy_type/{id}', 'ProductController@update_delivery_boy_type')->name('products.delivery_boy_type');
    Route::post('/products/FAQ/{id}', 'ProductController@update_FAQ')->name('products.updatefaq');
    Route::post('/products/priority', 'ProductController@update_priority')->name('products.priority');

    Route::resource('sellers', 'SellerController');
    Route::get('sellers_ban/{id}', 'SellerController@ban')->name('sellers.ban');
    Route::get('/sellers/destroy/{id}', 'SellerController@destroy')->name('sellers.destroy');
    Route::post('/bulk-seller-delete', 'SellerController@bulk_seller_delete')->name('bulk-seller-delete');
    Route::get('/sellers/view/{id}/verification', 'SellerController@show_verification_request')->name('sellers.show_verification_request');
    Route::get('/sellers/approve/{id}', 'SellerController@approve_seller')->name('sellers.approve');
    Route::get('/sellers/reject/{id}', 'SellerController@reject_seller')->name('sellers.reject');
    Route::get('/sellers/login/{id}', 'SellerController@login')->name('sellers.login');
    Route::post('/sellers/payment_modal', 'SellerController@payment_modal')->name('sellers.payment_modal');
    Route::get('/seller/payments', 'PaymentController@payment_histories')->name('sellers.payment_histories');
    Route::get('/seller/payments/show/{id}', 'PaymentController@show')->name('sellers.payment_history');

    Route::resource('customers', 'CustomerController');
    Route::get('customers_ban/{customer}', 'CustomerController@ban')->name('customers.ban');
    Route::get('/customers/login/{id}', 'CustomerController@login')->name('customers.login');
    Route::get('/customers/destroy/{id}', 'CustomerController@destroy')->name('customers.destroy');
    Route::post('/bulk-customer-delete', 'CustomerController@bulk_customer_delete')->name('bulk-customer-delete');

    Route::get('/newsletter', 'NewsletterController@index')->name('newsletters.index');
    Route::post('/newsletter/send', 'NewsletterController@send')->name('newsletters.send');
    Route::post('/newsletter/test/smtp', 'NewsletterController@testEmail')->name('test.smtp');

    Route::resource('profile', 'ProfileController');

    Route::post('/business-settings/update', 'BusinessSettingsController@update')->name('business_settings.update');
    Route::post('/business-settings/update/activation', 'BusinessSettingsController@updateActivationSettings')->name('business_settings.update.activation');
    Route::get('/general-setting', 'BusinessSettingsController@general_setting')->name('general_setting.index');
    Route::get('/activation', 'BusinessSettingsController@activation')->name('activation.index');
    Route::get('/payment-method', 'BusinessSettingsController@payment_method')->name('payment_method.index');
    Route::get('/file_system', 'BusinessSettingsController@file_system')->name('file_system.index');
    Route::get('/social-login', 'BusinessSettingsController@social_login')->name('social_login.index');
    Route::get('/smtp-settings', 'BusinessSettingsController@smtp_settings')->name('smtp_settings.index');
    Route::get('/google-analytics', 'BusinessSettingsController@google_analytics')->name('google_analytics.index');
    Route::get('/google-recaptcha', 'BusinessSettingsController@google_recaptcha')->name('google_recaptcha.index');
    Route::get('/google-map', 'BusinessSettingsController@google_map')->name('google-map.index');
    Route::get('/google-firebase', 'BusinessSettingsController@google_firebase')->name('google-firebase.index');

    //Facebook Settings
    Route::get('/facebook-chat', 'BusinessSettingsController@facebook_chat')->name('facebook_chat.index');
    Route::post('/facebook_chat', 'BusinessSettingsController@facebook_chat_update')->name('facebook_chat.update');
    Route::get('/facebook-comment', 'BusinessSettingsController@facebook_comment')->name('facebook-comment');
    Route::post('/facebook-comment', 'BusinessSettingsController@facebook_comment_update')->name('facebook-comment.update');
    Route::post('/facebook_pixel', 'BusinessSettingsController@facebook_pixel_update')->name('facebook_pixel.update');

    Route::post('/env_key_update', 'BusinessSettingsController@env_key_update')->name('env_key_update.update');
    Route::post('/payment_method_update', 'BusinessSettingsController@payment_method_update')->name('payment_method.update');
    Route::post('/google_analytics', 'BusinessSettingsController@google_analytics_update')->name('google_analytics.update');
    Route::post('/google_recaptcha', 'BusinessSettingsController@google_recaptcha_update')->name('google_recaptcha.update');
    Route::post('/google-map', 'BusinessSettingsController@google_map_update')->name('google-map.update');
    Route::post('/google-firebase', 'BusinessSettingsController@google_firebase_update')->name('google-firebase.update');
    //Currency
    Route::get('/currency', 'CurrencyController@currency')->name('currency.index');
    Route::post('/currency/update', 'CurrencyController@updateCurrency')->name('currency.update');
    Route::post('/your-currency/update', 'CurrencyController@updateYourCurrency')->name('your_currency.update');
    Route::get('/currency/create', 'CurrencyController@create')->name('currency.create');
    Route::post('/currency/store', 'CurrencyController@store')->name('currency.store');
    Route::post('/currency/currency_edit', 'CurrencyController@edit')->name('currency.edit');
    Route::post('/currency/update_status', 'CurrencyController@update_status')->name('currency.update_status');

    //Tax
    Route::resource('tax', 'TaxController');
    Route::get('/tax/edit/{id}', 'TaxController@edit')->name('tax.edit');
    Route::get('/tax/destroy/{id}', 'TaxController@destroy')->name('tax.destroy');
    Route::post('tax-status', 'TaxController@change_tax_status')->name('taxes.tax-status');


    Route::get('/verification/form', 'BusinessSettingsController@seller_verification_form')->name('seller_verification_form.index');
    Route::post('/verification/form', 'BusinessSettingsController@seller_verification_form_update')->name('seller_verification_form.update');
    Route::get('/vendor_commission', 'BusinessSettingsController@vendor_commission')->name('business_settings.vendor_commission');
    Route::post('/vendor_commission_update', 'BusinessSettingsController@vendor_commission_update')->name('business_settings.vendor_commission.update');

    Route::resource('/languages', 'LanguageController');
    Route::post('/languages/{id}/update', 'LanguageController@update')->name('languages.update');
    Route::get('/languages/destroy/{id}', 'LanguageController@destroy')->name('languages.destroy');
    Route::post('/languages/update_rtl_status', 'LanguageController@update_rtl_status')->name('languages.update_rtl_status');
    Route::post('/languages/key_value_store', 'LanguageController@key_value_store')->name('languages.key_value_store');

    //App Trasnlation
    Route::post('/languages/app-translations/import', 'LanguageController@importEnglishFile')->name('app-translations.import');
    Route::get('/languages/app-translations/show/{id}', 'LanguageController@showAppTranlsationView')->name('app-translations.show');
    Route::post('/languages/app-translations/key_value_store', 'LanguageController@storeAppTranlsation')->name('app-translations.store');
    Route::get('/languages/app-translations/export/{id}', 'LanguageController@exportARBFile')->name('app-translations.export');

    // website setting
    Route::group(['prefix' => 'website'], function() {
        Route::get('/footer', 'WebsiteController@footer')->name('website.footer');
        Route::get('/header', 'WebsiteController@header')->name('website.header');
        Route::get('/appearance', 'WebsiteController@appearance')->name('website.appearance');
        Route::get('/pages', 'WebsiteController@pages')->name('website.pages');
        Route::get('/zones', 'WebsiteController@zones')->name('website.zones');
        Route::resource('custom-pages', 'PageController');
        Route::get('/custom-pages/edit/{id}', 'PageController@edit')->name('custom-pages.edit');
        Route::get('/custom-pages/destroy/{id}', 'PageController@destroy')->name('custom-pages.destroy');
        Route::post('/custom-pages/home_settings_section_activation', 'PageController@home_settings_section_activation')->name('home_settings_section_activation.update_status');

        Route::resource('custom-zones', 'ZoneController');

        Route::get('/custom-zones/show_custom_zone', 'ZoneController@show_custom_zone')->name('custom-zones.show_custom_zone');
        Route::get('/custom-zones/edit/{id}', 'ZoneController@edit')->name('custom-zones.edit');
        Route::get('/custom-zones/destroy/{id}', 'ZoneController@destroy')->name('custom-zones.destroy');
    });

    // site features settings
    Route::resource('home_site_features','SiteFeatureController');
        Route::get('/home_site_features/create/{position}', 'SiteFeatureController@create')->name('home_site_features.create');
        Route::post('/home_site_features/update_status', 'SiteFeatureController@update_status')->name('home_site_features.update_status');
        Route::get('/home_site_features/destroy/{id}', 'SiteFeatureController@destroy')->name('home_site_features.destroy');

    Route::resource('roles', 'RoleController');
    Route::get('/roles/edit/{id}', 'RoleController@edit')->name('roles.edit');
    Route::get('/roles/destroy/{id}', 'RoleController@destroy')->name('roles.destroy');

    Route::resource('staffs', 'StaffController');
    Route::get('/staffs/destroy/{id}', 'StaffController@destroy')->name('staffs.destroy');

    Route::resource('flash_deals', 'FlashDealController');
    Route::get('/flash_deals/edit/{id}', 'FlashDealController@edit')->name('flash_deals.edit');
    Route::get('/flash_deals/destroy/{id}', 'FlashDealController@destroy')->name('flash_deals.destroy');
    Route::post('/flash_deals/update_status', 'FlashDealController@update_status')->name('flash_deals.update_status');
    Route::post('/flash_deals/update_featured', 'FlashDealController@update_featured')->name('flash_deals.update_featured');
    Route::post('/flash_deals/product_discount', 'FlashDealController@product_discount')->name('flash_deals.product_discount');
    Route::post('/flash_deals/product_discount_edit', 'FlashDealController@product_discount_edit')->name('flash_deals.product_discount_edit');

    //Subscribers
    Route::get('/subscribers', 'SubscriberController@index')->name('subscribers.index');
    Route::get('/subscribers/destroy/{id}', 'SubscriberController@destroy')->name('subscriber.destroy');

    // Route::get('/orders', 'OrderController@admin_orders')->name('orders.index.admin');
    // Route::get('/orders/{id}/show', 'OrderController@show')->name('orders.show');
    // Route::get('/sales/{id}/show', 'OrderController@sales_show')->name('sales.show');
    // Route::get('/sales', 'OrderController@sales')->name('sales.index');
    // All Orders
    Route::get('/all_orders', 'OrderController@all_orders')->name('all_orders.index');
    Route::get('/all_orders/{id}/show', 'OrderController@all_orders_show')->name('all_orders.show');

    // Inhouse Orders
    Route::get('/inhouse-orders', 'OrderController@admin_orders')->name('inhouse_orders.index');
    Route::get('/inhouse-orders/{id}/show', 'OrderController@show')->name('inhouse_orders.show');

    // Seller Orders
    Route::get('/seller_orders', 'OrderController@seller_orders')->name('seller_orders.index');
    Route::get('/seller_orders/{id}/show', 'OrderController@seller_orders_show')->name('seller_orders.show');

    Route::post('/bulk-order-status', 'OrderController@bulk_order_status')->name('bulk-order-status');


    // Pickup point orders
    Route::get('orders_by_pickup_point', 'OrderController@pickup_point_order_index')->name('pick_up_point.order_index');
    Route::get('/orders_by_pickup_point/{id}/show', 'OrderController@pickup_point_order_sales_show')->name('pick_up_point.order_show');

    Route::get('/orders/destroy/{id}', 'OrderController@destroy')->name('orders.destroy');
    Route::post('/bulk-order-delete', 'OrderController@bulk_order_delete')->name('bulk-order-delete');

    Route::post('/pay_to_seller', 'CommissionController@pay_to_seller')->name('commissions.pay_to_seller');

    //Reports
    Route::get('/stock_report', 'ReportController@stock_report')->name('stock_report.index');
    Route::get('/in_house_sale_report', 'ReportController@in_house_sale_report')->name('in_house_sale_report.index');
    Route::get('/seller_sale_report', 'ReportController@seller_sale_report')->name('seller_sale_report.index');
    Route::get('/wish_report', 'ReportController@wish_report')->name('wish_report.index');
    Route::get('/user_search_report', 'ReportController@user_search_report')->name('user_search_report.index');
    Route::get('/wallet-history', 'ReportController@wallet_transaction_history')->name('wallet-history.index');

    //Blog Section
    Route::resource('blog-category', 'BlogCategoryController');
    Route::get('/blog-category/destroy/{id}', 'BlogCategoryController@destroy')->name('blog-category.destroy');
    Route::resource('blog', 'BlogController');
    Route::get('/blog/destroy/{id}', 'BlogController@destroy')->name('blog.destroy');
    Route::post('/blog/change-status', 'BlogController@change_status')->name('blog.change-status');
    //frontend_update Section
    Route::resource('frontend_update-category', 'FrontendUpdateController');
    Route::get('/frontend_update-category/destroy/{id}', 'FrontendUpdateController@destroy')->name('frontend_update-category.destroy');
    Route::resource('frontend_update', 'FrontendUpdateController');
    Route::get('/frontend_update/destroy/{id}', 'FrontendUpdateController@destroy')->name('frontend_update.destroy');
    Route::post('/frontend_update/change-status', 'FrontendUpdateController@change_status')->name('frontend_update.change-status');

    //Coupons
    Route::resource('coupon', 'CouponController');
    Route::get('/coupon/destroy/{id}', 'CouponController@destroy')->name('coupon.destroy');

    //Reviews
    Route::get('/reviews', 'ReviewController@index')->name('reviews.index');
    Route::post('/reviews/published', 'ReviewController@updatePublished')->name('reviews.published');

    //Support_Ticket
    Route::get('support_ticket/', 'SupportTicketController@admin_index')->name('support_ticket.admin_index');
    Route::get('support_ticket/{id}/show', 'SupportTicketController@admin_show')->name('support_ticket.admin_show');
    Route::post('support_ticket/reply', 'SupportTicketController@admin_store')->name('support_ticket.admin_store');

    Route::post('/frontend_settings/home_settings_section_activation', 'HomeController@home_settings_section_activation')->name('home_settings_section_activation.update_status');
    //Pickup_Points
    Route::resource('pick_up_points', 'PickupPointController');
    Route::get('/pick_up_points/edit/{id}', 'PickupPointController@edit')->name('pick_up_points.edit');
    Route::get('/pick_up_points/destroy/{id}', 'PickupPointController@destroy')->name('pick_up_points.destroy');

    //conversation of seller customer
    Route::get('conversations', 'ConversationController@admin_index')->name('conversations.admin_index');
    Route::get('conversations/{id}/show', 'ConversationController@admin_show')->name('conversations.admin_show');

    Route::post('/sellers/profile_modal', 'SellerController@profile_modal')->name('sellers.profile_modal');
    Route::post('/sellers/approved', 'SellerController@updateApproved')->name('sellers.approved');

    Route::resource('attributes', 'AttributeController');
    Route::get('/attributes/edit/{id}', 'AttributeController@edit')->name('attributes.edit');
    Route::get('/attributes/destroy/{id}', 'AttributeController@destroy')->name('attributes.destroy');

    Route::resource('vendor_cancellation', 'VendorCancellationReasonController');
    Route::get('/vendor_cancellation/reason/create', 'VendorCancellationReasonController@create')->name('vendor_cancellation.create');
    Route::get('/vendor_cancellation/edit/{id}', 'VendorCancellationReasonController@edit')->name('vendor_cancellation.edit');
    Route::get('/vendor_cancellation/destroy/{id}', 'VendorCancellationReasonController@destroy')->name('vendor_cancellation.destroy');
    Route::post('/vendor_cancellation/update/{id}', 'VendorCancellationReasonController@update')->name('vendor_cancellation.update');

    //Attribute Value
    Route::post('/store-attribute-value', 'AttributeController@store_attribute_value')->name('store-attribute-value');
    Route::get('/edit-attribute-value/{id}', 'AttributeController@edit_attribute_value')->name('edit-attribute-value');
    Route::post('/update-attribute-value/{id}', 'AttributeController@update_attribute_value')->name('update-attribute-value');
    Route::get('/destroy-attribute-value/{id}', 'AttributeController@destroy_attribute_value')->name('destroy-attribute-value');


    Route::resource('category_attributes', 'CategoryAttributeController');
    Route::get('/category_attributes/edit/{id}', 'CategoryAttributeController@edit')->name('category_attributes.edit');
    Route::get('/category_attributes/destroy/{id}', 'CategoryAttributeController@destroy')->name('category_attributes.destroy');
    Route::post('/category_attribute_heads/bysubcategory', 'CategoryAttributeController@get_category_attributes_by_category')->name('category_attributes.get_category_attributes_by_category');

    //Colors
    Route::get('/colors', 'AttributeController@colors')->name('colors');
    Route::post('/colors/store', 'AttributeController@store_color')->name('colors.store');
    Route::get('/colors/edit/{id}', 'AttributeController@edit_color')->name('colors.edit');
    Route::post('/colors/update/{id}', 'AttributeController@update_color')->name('colors.update');
    Route::get('/colors/destroy/{id}', 'AttributeController@destroy_color')->name('colors.destroy');

    Route::resource('addons', 'AddonController');
    Route::post('/addons/activation', 'AddonController@activation')->name('addons.activation');

    Route::get('/customer-bulk-upload/index', 'CustomerBulkUploadController@index')->name('customer_bulk_upload.index');
    Route::post('/bulk-user-upload', 'CustomerBulkUploadController@user_bulk_upload')->name('bulk_user_upload');
    Route::post('/bulk-customer-upload', 'CustomerBulkUploadController@customer_bulk_file')->name('bulk_customer_upload');
    Route::get('/user', 'CustomerBulkUploadController@pdf_download_user')->name('pdf.download_user');
    //Customer Package

    Route::resource('customer_packages', 'CustomerPackageController');
    Route::get('/customer_packages/edit/{id}', 'CustomerPackageController@edit')->name('customer_packages.edit');
    Route::get('/customer_packages/destroy/{id}', 'CustomerPackageController@destroy')->name('customer_packages.destroy');

    //Classified Products
    Route::get('/classified_products', 'CustomerProductController@customer_product_index')->name('classified_products');
    Route::post('/classified_products/published', 'CustomerProductController@updatePublished')->name('classified_products.published');

    // User Tags
    Route::resource('user_tags', 'UserTagController');
    // Route::get('/attributes/new', 'AttributeController@create')->name('attributes.create');
    Route::get('/user_tags/edit/{id}', 'UserTagController@edit')->name('user_tags.edit');
    Route::post('/user_tags/update/{id}', 'UserTagController@update')->name('user_tags.update');
    Route::get('/user_tags/destroy/{id}', 'UserTagController@destroy')->name('user_tags.destroy');
    Route::post('/user_tags/by_category/', 'UserTagController@get_user_tags_by_category')->name('user_tags.get_user_tags_by_category');

    Route::post('/zones/featured', 'ZoneController@updateFeatured')->name('zones.featured');
   //try guide
   Route::resource('try_guide','TryGuideController');
   Route::get('/try_guide', 'TryGuideController@index')->name('try_guide.index');
   Route::post('/try_guide/create', 'TryGuideController@create')->name('try_guide.create');
   Route::get('/try_guide/edit/{id}', 'TryGuideController@edit')->name('try_guide.edit');
   Route::get('/try_guide/destroy/{id}', 'TryGuideController@destroy')->name('try_guide.destroy');

    // service center
    Route::resource('service_centers','ServiceCenterController');
    Route::get('/service_centers/destroy/{id}', 'ServiceCenterController@destroy')->name('service_centers.destroy');

    //Shipping Configuration
    Route::get('/shipping_configuration', 'BusinessSettingsController@shipping_configuration')->name('shipping_configuration.index');
    Route::post('/shipping_configuration/update', 'BusinessSettingsController@shipping_configuration_update')->name('shipping_configuration.update');

    // Route::resource('pages', 'PageController');
    // Route::get('/pages/destroy/{id}', 'PageController@destroy')->name('pages.destroy');

    Route::resource('countries', 'CountryController');
    Route::post('/countries/status', 'CountryController@updateStatus')->name('countries.status');

    Route::resource('states','StateController');
	Route::post('/states/status', 'StateController@updateStatus')->name('states.status');

    Route::resource('cities', 'CityController');
    Route::get('/cities/edit/{id}', 'CityController@edit')->name('cities.edit');
    Route::get('/cities/destroy/{id}', 'CityController@destroy')->name('cities.destroy');
    Route::post('/cities/status', 'CityController@updateStatus')->name('cities.status');

    Route::view('/system/update', 'backend.system.update')->name('system_update');
    Route::view('/system/server-status', 'backend.system.server_status')->name('system_server');

    // uploaded files
    Route::any('/uploaded-files/file-info', 'AizUploadController@file_info')->name('uploaded-files.info');
    Route::resource('/uploaded-files', 'AizUploadController');
    Route::get('/uploaded-files/destroy/{id}', 'AizUploadController@destroy')->name('uploaded-files.destroy');

    Route::get('/all-notification', 'NotificationController@index')->name('admin.all-notification');

    Route::get('/cache-cache', 'AdminController@clearCache')->name('cache.clear');

    Route::resource('bank_offers', 'BankOfferController');
    // Route::get('/vendor_cancellation/reason/create', 'VendorCancellationReasonController@create')->name('vendor_cancellation.create');
    Route::get('/bank_offers/edit/{id}', 'BankOfferController@edit')->name('bank_offers.edit');
    Route::get('/bank_offers/destroy/{id}', 'BankOfferController@destroy')->name('bank_offers.destroy');
    Route::post('/bank_offers/update/{id}', 'BankOfferController@update')->name('bank_offers.update');


    Route::resource('company_offers', 'CompanyOfferController');
    // Route::get('/vendor_cancellation/reason/create', 'VendorCancellationReasonController@create')->name('vendor_cancellation.create');
    Route::get('/company_offers/edit/{id}', 'CompanyOfferController@edit')->name('company_offers.edit');
    Route::get('/company_offers/destroy/{id}', 'CompanyOfferController@destroy')->name('company_offers.destroy');
    Route::post('/company_offers/update/{id}', 'CompanyOfferController@update')->name('company_offers.update');

    Route::resource('emi_offers', 'EmiOfferController');
    // Route::get('/vendor_cancellation/reason/create', 'VendorCancellationReasonController@create')->name('vendor_cancellation.create');
    Route::get('/emi_offers/edit/{id}', 'EmiOfferController@edit')->name('emi_offers.edit');
    Route::get('/emi_offers/destroy/{id}', 'EmiOfferController@destroy')->name('emi_offers.destroy');
    Route::post('/emi_offers/update/{id}', 'EmiOfferController@update')->name('emi_offers.update');

    Route::resource('customer_cancellation', 'CustomerCancellationReasonController');
    // Route::get('/vendor_cancellation/reason/create', 'VendorCancellationReasonController@create')->name('vendor_cancellation.create');
    Route::get('/customer_cancellation/edit/{id}', 'CustomerCancellationReasonController@edit')->name('customer_cancellation.edit');
    Route::get('/customer_cancellation/destroy/{id}', 'CustomerCancellationReasonController@destroy')->name('customer_cancellation.destroy');
    Route::post('/customer_cancellation/update/{id}', 'CustomerCancellationReasonController@update')->name('customer_cancellation.update');

    Route::resource('customer_replacement_reason', 'CustomerReplacementReasonController');
    // Route::get('/vendor_cancellation/reason/create', 'VendorCancellationReasonController@create')->name('vendor_cancellation.create');
    Route::get('/customer_replacement_reason/edit/{id}', 'CustomerReplacementReasonController@edit')->name('customer_replacement_reason.edit');
    Route::get('/customer_replacement_reason/destroy/{id}', 'CustomerReplacementReasonController@destroy')->name('customer_replacement_reason.destroy');
    Route::post('/customer_replacement_reason/update/{id}', 'CustomerReplacementReasonController@update')->name('customer_replacement_reason.update');

    Route::resource('customer_return_reason', 'CustomerReturnReasonController');
    // Route::get('/vendor_cancellation/reason/create', 'VendorCancellationReasonController@create')->name('vendor_cancellation.create');
    Route::get('/customer_return_reason/edit/{id}', 'CustomerReturnReasonController@edit')->name('customer_return_reason.edit');
    Route::get('/customer_return_reason/destroy/{id}', 'CustomerReturnReasonController@destroy')->name('customer_return_reason.destroy');
    Route::post('/customer_return_reason/update/{id}', 'CustomerReturnReasonController@update')->name('customer_return_reason.update');

    Route::resource('delivery_boy_checklist', 'DeliveryBoyChecklistController');
    // Route::get('/vendor_cancellation/reason/create', 'VendorCancellationReasonController@create')->name('vendor_cancellation.create');
    Route::get('/delivery_boy_checklist/edit/{id}', 'DeliveryBoyChecklistController@edit')->name('delivery_boy_checklist.edit');
    Route::get('/delivery_boy_checklist/destroy/{id}', 'DeliveryBoyChecklistController@destroy')->name('delivery_boy_checklist.destroy');
    Route::post('/delivery_boy_checklist/update/{id}', 'DeliveryBoyChecklistController@update')->name('delivery_boy_checklist.update');



    Route::resource('vendor_checklist', 'VendorChecklistController');
    // Route::get('/vendor_cancellation/reason/create', 'VendorCancellationReasonController@create')->name('vendor_cancellation.create');
    Route::get('/vendor_checklist/edit/{id}', 'VendorChecklistController@edit')->name('vendor_checklist.edit');
    Route::get('/vendor_checklist/destroy/{id}', 'VendorChecklistController@destroy')->name('vendor_checklist.destroy');
    Route::post('/vendor_checklist/update/{id}', 'VendorChecklistController@update')->name('vendor_checklist.update');

    Route::resource('category_attribute_heads', 'CategoryAttributeHeadController');
    // Route::get('/attributes/new', 'AttributeController@create')->name('attributes.create');
    Route::get('/category_attribute_heads/edit/{id}', 'CategoryAttributeHeadController@edit')->name('category_attribute_heads.edit');
    Route::post('/category_attribute_heads/update/{id}', 'CategoryAttributeHeadController@update')->name('category_attribute_heads.update');
    Route::get('/category_attribute_heads/destroy/{id}', 'CategoryAttributeHeadController@destroy')->name('category_attribute_heads.destroy');

    Route::resource('review_factors', 'ReviewFactorController');
    // Route::get('/attributes/new', 'AttributeController@create')->name('attributes.create');
    Route::get('/review_factors/edit/{id}', 'ReviewFactorController@edit')->name('review_factors.edit');
    Route::post('/review_factors/update/{id}', 'ReviewFactorController@update')->name('review_factors.update');
    Route::get('/review_factors/destroy/{id}', 'ReviewFactorController@destroy')->name('review_factors.destroy');


    Route::resource('buying_guide', 'BuyingGuideController');
   // Route::get('/vendor_cancellation/reason/create', 'VendorCancellationReasonController@create')->name('vendor_cancellation.create');
    Route::get('/buying_guide/edit/{id}', 'BuyingGuideController@edit')->name('buying_guide.edit');
    Route::post('/buying_guide/update/{id}', 'BuyingGuideController@update')->name('buying_guide.update');
    Route::get('/buying_guide/destroy/{id}', 'BuyingGuideController@destroy')->name('buying_guide.destroy');



    Route::resource('delivery_boy_guide', 'DeliveryBoyGuideController');
   // Route::get('/vendor_cancellation/reason/create', 'VendorCancellationReasonController@create')->name('vendor_cancellation.create');
    Route::get('/delivery_boy_guide/edit/{id}', 'DeliveryBoyGuideController@edit')->name('delivery_boy_guide.edit');
    Route::post('/delivery_boy_guide/update/{id}', 'DeliveryBoyGuideController@update')->name('delivery_boy_guide.update');
    Route::get('/delivery_boy_guide/destroy/{id}', 'DeliveryBoyGuideController@destroy')->name('delivery_boy_guide.destroy');


    Route::resource('vendor_package_guide', 'VendorPackageGuideController');
   // Route::get('/vendor_cancellation/reason/create', 'VendorCancellationReasonController@create')->name('vendor_cancellation.create');
    Route::get('/vendor_package_guide/edit/{id}', 'VendorPackageGuideController@edit')->name('vendor_package_guide.edit');
    Route::post('/vendor_package_guide/update/{id}', 'VendorPackageGuideController@update')->name('vendor_package_guide.update');
    Route::get('/vendor_package_guide/destroy/{id}', 'VendorPackageGuideController@destroy')->name('vendor_package_guide.destroy');

});
