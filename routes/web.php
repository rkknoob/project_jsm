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



Route::group(['prefix' => 'cms','middleware' => 'Check'],function(){

    Route::get('/home','Backend\Auth\LoginController@index');
    Route::post('/CheckLogin','Backend\Auth\LoginController@checkLogin');

    //--- Reset Password ---//
    Route::get('/resetpassword', 'Backend\Auth\ResetPasswordController@index');
    Route::POST('/resetpassword', 'Backend\Auth\ResetPasswordController@store');
    Route::get('/resetPassword/{token}', 'Backend\Auth\ResetPasswordController@newreset');
    Route::post('/resetpassword/update/{id}', 'Backend\Auth\ResetPasswordController@update');;

});



Route::group(['prefix' => 'cms','middleware' => 'admin_auth'],function(){

    Route::get('/dashboard','Backend\DashboardController@index');
    //--- Login ---//
    Route::get('/logout','Backend\Auth\LoginController@logout');

    //--- Admin ---//
    Route::get('/admin','Backend\AdminController@index')->name('backend.Admin.index');
    Route::get('/admin/add','Backend\AdminController@add')->name('backend.Admin.form');
    Route::post('/admin/add', 'Backend\AdminController@store');
    Route::get('/admin/edit/{id}', 'Backend\AdminController@edit');
    Route::put('/admin/edit/save/{id}', 'Backend\AdminController@update');

    Route::post('/admin/datatables','Backend\AdminController@getDatatable')->name('settingadmin.data');


//--Admin Menu --//
    Route::post('settingmenu/group/datatables', 'Backend\SettingMenuController@getDatatable')->name('settinggroup.data');
    Route::resource('/settingmenu','Backend\SettingMenuController');
    Route::resource('settingmenu-mainmenu','Backend\SettingMainMenuController');
    Route::post('/settingmenu/mainmenu/datatables','Backend\SettingMainMenuController@getDatatable')->name('settingmainmenu.data');



    Route::post('/submenu/datatables','Backend\SettingSubMenuController@getDatatable')->name('settingsubmenu.data');
    Route::resource('settingmenu-mainmenu-submenu','Backend\SettingSubMenuController');

    Route::post('/homemenu/datatables','Backend\SettingHomeController@getDatatable')->name('settinghomemenu.data');
    Route::resource('settingmenu-home','Backend\SettingHomeController');

    Route::post('/lang/datatables','Backend\SettingLangController@getDatatable')->name('settinglang.data');
    Route::resource('setting-lang','Backend\SettingLangController');
    //--- Product ---//

    Route::post('products/datatables', 'Backend\ProductController@getDatatable')->name('product.data');
    Route::get('/products/sku/{id}', 'Backend\ProductController@getsku');
    Route::post('/products/active', 'Backend\ProductController@active');
    Route::post('/products/uploadimage', 'Backend\ProductController@upload');
    Route::get('/products/edit/{id}', 'Backend\ProductController@edit')->name('product.edit');
    Route::get('/products/{id}/images', 'Backend\ProductController@getImageByProduct');

    Route::resource('/products', 'Backend\ProductController');
    Route::resource('/productdes', 'Backend\ProductDesController');
    Route::get('/products/add', 'Backend\ProductController@addproduct');

    //--- Sku ---//
    Route::resource('/sku', 'Backend\SkuController');
    Route::get('/sku/add', 'Backend\SkuController@addSku');
    Route::post('/sku/add/fetch', 'Backend\SkuController@fetch')->name('sku.fetch');
    Route::post('/sku/fetch', 'Backend\SkuController@fetch')->name('sku.fetch');
    Route::post('/sku/fetchTable', 'Backend\SkuController@fetchTable')->name('sku.fetchTable');
    Route::post('sku/datatables', 'Backend\SkuController@getDatatable')->name('sku.data');
    Route::get('/sku/edit/{id}', 'Backend\SkuController@edit')->name('sku.edit');
    Route::post('/sku/update', 'Backend\SkuController@update')->name('sku.update');


    //----- Category Banner -----//
    Route::resource('/category', 'Backend\CategoryController');
    Route::post('category/datatables', 'Backend\CategoryController@getDatatable')->name('category.data');
    Route::get('/category/edit/{id}', 'Backend\CategoryController@edit')->name('category.edit');
    Route::post('/category/uploadimage', 'Backend\CategoryController@upload');
    Route::post('/category/update', 'Backend\CategoryController@update')->name('category.update');


    //------ Banner -------//
    Route::resource('/banner', 'Backend\SettingBannerController');
    Route::post('banner/datatables', 'Backend\SettingBannerController@getDatatable')->name('banner.data');
    Route::post('/banner/add/fetch', 'Backend\SettingBannerController@fetch')->name('banner.fetch');
    Route::post('/banner/fetch', 'Backend\SettingBannerController@fetch')->name('banner.fetch');
    Route::post('/banner/fetchTable', 'Backend\SettingBannerController@fetchTable')->name('banner.fetchTable');
    Route::post('/banner/uploadimage', 'Backend\SettingBannerController@upload');
    Route::get('/banner/edit/{id}', 'Backend\SettingBannerController@edit')->name('banner.edit');
    Route::post('/banner/update', 'Backend\SettingBannerController@update')->name('banner.update');

    
    Route::post('/banner/up',   'Backend\SettingBannerController@up');
    Route::post('/banner/down', 'Backend\SettingBannerController@down');

    //------ Video -------//
    Route::resource('/video', 'Backend\SettingVideoController');
    Route::post('video/datatables', 'Backend\SettingVideoController@getDatatable')->name('video.data');
    Route::get('/video/edit/{id}', 'Backend\SettingVideoController@edit')->name('video.edit');
    Route::post('/video/update', 'Backend\SettingVideoController@update')->name('video.update');

    //------ Popup -------//
    Route::resource('/popup', 'Backend\SettingPopupController');
    Route::post('popup/datatables', 'Backend\SettingPopupController@getDatatable')->name('popup.data');
    Route::get('/popup/edit/{id}', 'Backend\SettingPopupController@edit')->name('popup.edit');
    Route::post('/popup/uploadimage', 'Backend\SettingPopupController@upload');
    Route::post('/popup/update', 'Backend\SettingPopupController@update')->name('popup.update');


    //Brand JSM
    Route::get('/brandjsm/add', 'Backend\Brandjsm\SettingBrandController@adddata')->name('backend.Brandjsm.form');
    Route::resource('/brandjsm/concept', 'Backend\Brandjsm\SettingBrandConceptController');
    Route::resource('/brandjsm/brandcontent', 'Backend\Brandjsm\SettingBrandController');
    Route::resource('/brandjsm', 'Backend\Brandjsm\SettingBrandConceptController');
    Route::get('/brandjsm/content/{id}', 'Backend\Brandjsm\SettingBrandController@finddata');
    Route::post('brandjsm/datatables', 'Backend\Brandjsm\SettingBrandController@getDatatable')->name('brandjsm.data');
    Route::post('brandjsm/concept/datatables', 'Backend\Brandjsm\SettingBrandConceptController@getDatatable')->name('brandconcept.data');
    Route::get('/film','Backend\BrandJsmController@listFilm')->name('backend.Brandjsm.film');
    Route::get('/film/edit/{id}','Backend\BrandJsmController@editFilm');

    //--- Madazine ---//
    Route::get('/brandjsm-magazine-setting/add', 'Backend\Brandjsm\BrandMagazineController@adddata')->name('backend.Brandjsm.formmag');
    Route::resource('/brandjsm-magazine-setting', 'Backend\Brandjsm\BrandMagazineController');
    Route::post('brandjsm-magazine-setting/datatables', 'Backend\Brandjsm\BrandMagazineController@getDatatable')->name('brandmag.data');
    Route::get('/brandjsm-magazine-setting/edit/{id}','Backend\Brandjsm\BrandMagazineController@edit');
    

    //----- Artist Tip -----//
    Route::resource('/artistTip', 'Backend\ArtistTipController');
    Route::post('arttip/datatables', 'Backend\ArtistTipController@getDatatable')->name('arttip.data');
    Route::post('/artistTip/uploadimage', 'Backend\ArtistTipController@upload');
    Route::get('/artistTip/edit/{id}', 'Backend\ArtistTipController@edit')->name('arttip.edit');
    Route::post('/artistTip/update', 'Backend\ArtistTipController@update')->name('arttip.update');

    //----- Line Story -----//
    Route::resource('/linestory', 'Backend\LineStoryController');
    Route::post('/linestory/uploadimage', 'Backend\LineStoryController@upload');
    Route::post('linestory/datatables', 'Backend\LineStoryController@getDatatable')->name('linestory.data');
    Route::get('/linestory/edit/{id}', 'Backend\LineStoryController@edit')->name('linestory.edit');
    Route::post('/linestory/update', 'Backend\LineStoryController@update')->name('linestory.update');
    Route::get('/linestory/{id}/images', 'Backend\LineStoryController@getImageByProduct');

    //----Artist -----//
    Route::get('/artist/magazine/add', 'Backend\Artist\ArtistMagazineController@adddata')->name('backend.Artist.form');
    Route::post('/artistmagazine/datatables', 'Backend\Artist\ArtistMagazineController@getDatatable')->name('magazine.data');
    Route::resource('/artist/magazine', 'Backend\Artist\ArtistMagazineController');
    Route::post('/magazine/uploadimage', 'Backend\Artist\ArtistMagazineController@upload');

    Route::resource('/artist', 'Backend\Artist\ArtistController');
    Route::post('artist/datatables', 'Backend\Artist\ArtistController@getDatatable')->name('intro.data');

    //----- Line Story -----//
    Route::resource('/lineStory', 'Backend\LineStoryController');
    Route::post('/lineStory/uploadimage', 'Backend\LineStoryController@upload');
    Route::post('lineStory/datatables', 'Backend\LineStoryController@getDatatable')->name('linestory.data');
    Route::get('/Linestory/{id}/images', 'Backend\LineStoryController@getImageByProduct');

    //----- Event -----//
    Route::resource('/event', 'Backend\EventController');
    Route::post('/event/uploadimage', 'Backend\EventController@upload');
    Route::post('event/datatables', 'Backend\EventController@getDatatable')->name('event.data');
    Route::get('/event/edit/{id}', 'Backend\EventController@edit')->name('event.edit');
    Route::post('/event/update', 'Backend\EventController@update')->name('event.update');

    //----- FIND A STORE -----//
    Route::resource('/store/plops', 'Backend\PlopsController');
    Route::resource('/store', 'Backend\FindStoreController');
    Route::post('store/datatables', 'Backend\FindStoreController@getDatatable')->name('store.data');
    Route::get('/store/plops/edit/{id}', 'Backend\PlopsController@edit')->name('plops.edit');
    Route::get('/store/edit/{id}', 'Backend\FindStoreController@edit')->name('store.edit');
    Route::post('/store/uploadimage', 'Backend\FindStoreController@upload');
    Route::post('plops/datatables', 'Backend\PlopsController@getDatatable')->name('plops.data');

    Route::post('/plops/uploadimage', 'Backend\PlopsController@upload');

    //----- Notice -----//
    Route::resource('/notice', 'Backend\NoticeController');
    Route::post('/notice/uploadimage', 'Backend\NoticeController@upload');
    Route::post('notice/datatables', 'Backend\NoticeController@getDatatable')->name('notice.data');
    Route::get('/notice/{id}/images', 'Backend\NoticeController@getImageByProduct');
    Route::get('/notice/edit/{id}', 'Backend\NoticeController@edit')->name('notice.edit');
    Route::post('/notice/update', 'Backend\NoticeController@update')->name('notice.update');

    Route::resource('/qa/settingqa', 'Backend\Qa\SettingQaController');
    Route::resource('/qa/replyqa', 'Backend\Qa\SettingQaboardController');
    Route::POST('/qa/reply/show', 'Backend\Qa\SettingQaboardController@showblog')->name('boardshow.data');
    Route::post('qa/datatables', 'Backend\Qa\SettingQaboardController@getDatatable')->name('qaboard.data');

    Route::resource('/review/settingreview', 'Backend\Review\ReviewSettingController');
    Route::post('review/datatables', 'Backend\Review\ReviewSettingController@getDatatable')->name('review.data');

    Route::resource('/faq/settingfaq', 'Backend\Faq\SettingFaqController');
    Route::post('faq/datatables', 'Backend\Faq\SettingFaqController@getDatatable')->name('faq.data');


    Route::resource('/faq/settingfaq-cate', 'Backend\Faq\SettingFaqCateController');
    Route::post('faq-cate/datatables', 'Backend\Faq\SettingFaqCateController@getDatatable')->name('faqcate.data');


    Route::get('/{any}', function () {
        return view('errors.403');
    });

});


Auth::routes();

Route::get('index/login','Auth\FLoginController@index');
Route::post('index/checkLogin','Auth\FLoginController@checkLogin');
Route::get('index/logout','Auth\FLoginController@logout');

Route::group(['middleware' => 'frontguest'],function(){

    Route::get('/', 'HomeController@index');
    Route::get('/logout','Auth\LoginController@logout');
    Route::get('/resetpassword', 'Frontend\ResetPasswordController@index');
    Route::POST('/resetpassword', 'Frontend\ResetPasswordController@store');
    Route::get('/resetPassword/{token}', 'Frontend\ResetPasswordController@newreset');
    Route::post('/resetpassword/update/{id}', 'Frontend\ResetPasswordController@update');;
    Route::get('/brand', 'Frontend\BrandController@index');// หน้า Brand
    Route::get('/brand/magazine', 'Frontend\BrandController@magazines');
    Route::get('/brand/film', 'Frontend\BrandController@film');
    Route::get('/brand/magazine/media/cid/{id}', 'Frontend\BrandController@media');// หลังจาก กด รูปภาพ Magazine
    Route::get('/brand/film/media/cid/{id}', 'Frontend\BrandController@film_media');// หลังจาก กด รูปภาพ film



///menu  artist jsm
///
    Route::get('/artist', 'Frontend\ArtistController@index');// หน้า artist
    Route::get('/artist/magazines', 'Frontend\ArtistController@magazine');// หน้า artist
    Route::get('/artist/magazine/media/cid/{id}', 'Frontend\ArtistController@media');// หน้า artist

////me artist tip
    Route::get('/artist/tip', 'Frontend\ArtistController@Artisttip');// หน้า artist tip
    Route::get('/artist/tip2', 'Frontend\ArtistController@artisttip02');
    Route::get('/Detail/Artis', 'Frontend\ArtistController@detailartis');// หน้า Detail Review
    Route::get('/artist/magazine', 'Frontend\ArtistController@artistmagazine');// หน้า Artist Magazine

    ////---- Menu Artist Tip ----////
    Route::get('/artisttip', 'Frontend\ArtistTipController@listartisttip');// หน้า artist tip
    Route::get('/artisttip/{id}', 'Frontend\ArtistTipController@showid');// หน้า Detail Review

    Route::get('/store', 'Frontend\StoreController@index');// หน้า store
    Route::get('/store/detail/{id}', 'Frontend\StoreController@detailstore');// หน้า store


    Route::get('/event', 'Frontend\EventController@index');// หน้า event
    Route::get('/event/endevent', 'Frontend\EventController@Event2');// หน้า event
    Route::get('/event2page2', 'Frontend\EventController@Event2page2');// หน้า event
    Route::get('/Event/detail/{id}', 'Frontend\EventController@show');// หน้า faq
    Route::get('/linestory', 'Frontend\LineStoryController@index');// หน้า Linestory
    Route::get('/linestory/detail/{id}', 'Frontend\LineStoryController@show');// หน้า Linestory
    Route::get('/event/details', 'Frontend\EventController@details');// หน้า event
    Route::get('/event/details_01', 'Frontend\EventController@details_01');// หน้า event
    Route::get('/event/details/{id}', 'Frontend\EventController@details');// หน้า event
    // Route::get('/event/details_03', 'Frontend\EventController@details_03');// หน้า event
    // Route::get('/event/details_04', 'Frontend\EventController@details_04');// หน้า event


//////////////////////////////////////Review//////////////////////////
    Route::get('/review', 'Frontend\ReviewController@index');// หน้า Review
    Route::get('/review/add/{id}', 'Frontend\ReviewController@create');// หน้า Review
    Route::POST('/review/save/data', 'Frontend\ReviewController@store');// หน้า Review
    Route::get('/review/board/view/category/{id}/{product_id}', 'Frontend\ReviewController@reviewblog');// หน้า Review
/////////////////////////////////////////////////////////////////////////////////////////////////////////////

    Route::get('/faq', 'Frontend\faqController@index');// หน้า faq
    Route::get('/faq/{id}', 'Frontend\faqController@show');// หน้า faq
    Route::get('/notice', 'Frontend\NoticeController@index');// หน้า faq
    Route::get('/notice/detail/{id}', 'Frontend\NoticeController@show');// หน้า faq
    Route::get('/qa', 'Frontend\QAController@index');// หน้า QA
    Route::delete('/qa/dele/{id}', 'Frontend\QAController@destroy');// หน้า QA
    Route::get('/qa/cate/{id}/', 'Frontend\QAController@show');// หน้า QA fitter



    Route::get('/qa/board', 'Frontend\QAController@detailqa');// หน้า faq
    Route::get('/qa/board/view/category/{id}/{topic}', 'Frontend\QAController@board');// หน้า faq
    Route::post('/qa/board/add', 'Frontend\QAController@store');// หน้า faq
    Route::get('/qa/board/edit/{id}', 'Frontend\QAController@edit');//
    Route::PUT('/qa/board/save', 'Frontend\QAController@update');// หน้า faq
    Route::post('/qa/board/fetch', 'Frontend\QAController@fetch');// fet producy
    Route::get('refreshcaptcha', 'Frontend\QAController@refreshCaptcha');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

    Route::get('lang/{locale}', 'HomeController@lang');
    Route::get('/product', 'Frontend\ProductController@index'); // หน้า all Product
    Route::get('/Product/Category/list/cid/soft/{te}/{id}', 'Frontend\ProductController@getall'); // หน้า Product Category
    Route::get('/Product/Category/list/cid/{id}', 'Frontend\ProductController@show'); // หน้า Product Category
    Route::POST('/Product/choose/', 'Frontend\ProductController@choose'); // หน้า Product
    // Route::POST('datadetails', 'Frontend\ProductController@color'); // หน้า Product Category
    Route::POST('datadetails', 'Frontend\ProductController@color');

    Route::get('/product/list/{id}', 'Frontend\ProductController@getdatalist');
    Route::get('/product/listall', 'Frontend\ProductController@productlist');
    Route::get('/product/detail/view/{id}', 'Frontend\ProductController@getdata'); // หน้า Product Detail
    Route::post('/products/uploadimage', 'Backend\ProductController@upload');
    Route::get('/search', 'Frontend\SearchController@index'); // หน้า หลังจาก กดปุ๋ม Search


////////////////////////////////Payment สั่งซื้อ/////////////////
    Route::post('/Cart/view', 'Frontend\ProductpaymentController@cart'); // หน้า หลังจาก กดปุ่มซื้อ Go to Cart
    Route::get('/Order/pgform', 'Frontend\ProductpaymentController@pgform'); // หน้า หลังจาก กดปุ่ม Buy Now
    Route::get('/product/detail/view/{id}', 'Frontend\ProductController@getdata'); // หน้า Product Detail
////////////////////////////////Payment สั่งซื้อ/////////////////
    Route::get('/Payment/Cart/view', 'Frontend\ProductpaymentController@index'); // หน้า หลังจาก กดปุ่มซื้อ Go to Cart
    Route::get('/Order/pgform', 'Frontend\ProductpaymentController@pgform'); // หน้า หลังจาก กดปุ่ม Buy Now

/////////////// Regiter Front-End ///////////////
    Route::get('/register', 'Auth\RegisterController@index');
    Route::post('/register', 'Auth\RegisterController@store');



});

//Front//////menu brand jsm



/////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////// BACK OFFICE //////////////////////////////////////////////