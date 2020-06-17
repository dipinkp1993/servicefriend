<?php

Route::view('/', 'sitehome');
    Auth::routes();

    Route::get('/login/servicecenter', 'Auth\LoginController@showServiceCenterLoginForm')->name('servicecenterlogin');
    Route::get('/login/wholesaler', 'Auth\LoginController@showWholesalerLoginForm')->name('wholesalerlogin');
    Route::get('/register/servicecenter', 'Auth\RegisterController@showServicecenterRegisterForm');
   // Route::get('/register/labemployee', 'Auth\RegisterController@showWriterRegisterForm');

    Route::post('/login/servicecenter', 'Auth\LoginController@servicecenterLogin');
    Route::post('/login/wholesaler', 'Auth\LoginController@wholesalerLogin');
    Route::post('/register/servicecenter', 'Auth\RegisterController@createServiceCenter')->name('servicecenterregister');
    Route::get('/register/user', 'Auth\RegisterController@userregisterView');
    Route::post('/register/user', 'Auth\RegisterController@create')->name('userregister');

    

    
   
        // login protected routes.
    Route::group(['middleware' => ['auth.servicecenter']], function () {
            // login protected routes.
            Route::get('/servicecenter','ServiceCenterController@index');
            Route::get('/servicecenter/userrequests','ServiceCenterController@showServiceRequests')->name('ureqview');
            Route::post('/servicecenter/userrequests','ServiceCenterController@updateServiceRequests')->name('updateservicerequeststatus');
            Route::post('/servicecenter/userrequestscompletion','ServiceCenterController@completeServiceRequests')->name('completeservicerequest');
            
            Route::get('/servicecenter/invoice/{id}','ServiceCenterController@showInvoice')->name('shoeinvoice');
            Route::get('/servicecenter/userspartrequests','ServiceCenterController@partRequestsHistoryView')->name('upreqview');
            Route::post('/servicecenter/userspartrequests','ServiceCenterController@updatePartRequests')->name('updatepartrequeststatus');
            Route::get('/servicecenter/partrequesttoadmin','ServiceCenterController@partRequestsViewadmin')->name('viewpartrequestadmin');
            Route::post('/servicecenter/partrequesttoadmin','ServiceCenterController@createpartsRequestTows')->name('cpra');
            Route::get('/servicecenter/partrequesttoadminhistory','ServiceCenterController@partRequestsTowsHistoryView')->name('prtoadmin');
            Route::post('/servicecenter/partrequesttoadminhistory','ServiceCenterController@payPartRequests')->name('paypartws');
            Route::get('/servicecenter/partbill/{id}','ServiceCenterController@showPartBill')->name('pbill');
            Route::get('/servicecenter/changepassword','ServiceCenterController@changePasswordView')->name('changescpview');
            Route::post('/servicecenter/changepassword','ServiceCenterController@changePasswordAction')->name('changecenterpassword');
            //Route::any('/servicecenter/logout', 'ServiceCenterController@scLogout')->name('sclogout');
            //Route::view('/admin', 'auth.admin');

    //Route::view('/admin/userlist', 'auth.admin');
            

        });

        Route::group(['middleware' => ['auth']], function () {
            Route::get('/home', 'HomeController@index');
            Route::get('/home/servicerequest', 'HomeController@serviceRequestsView');
            Route::post('/home/servicerequest', 'HomeController@createServiceRequest')->name('createservicerequest');
            Route::get('/home/servicerequesthistory', 'HomeController@serviceRequestsHistoryView')->name('srview');
            Route::post('/home/servicerequesthistory', 'HomeController@payServiceRequests')->name('payuserservice');
            Route::get('/home/partrequest', 'HomeController@partRequestsView');
            Route::post('/home/partrequest','HomeController@createpartsRequest')->name('cpr');
            Route::get('/home/partrequesthistory', 'HomeController@partRequestsHistoryView')->name('prview');
            Route::post('/home/partrequesthistory', 'HomeController@payPartRequests')->name('paypart');
            Route::get('/home/servicebill/{id}','HomeController@showServiceBill')->name('servicebilluser');
            Route::get('/home/partbill/{id}','HomeController@showPartBill')->name('partbilluser');
            Route::get('/home/changepassword','HomeController@changePasswordView')->name('changeupview');
            Route::post('/home/changepassword','HomeController@changePasswordAction')->name('changeuserpassword');
        });

        Route::group(['middleware' => ['auth.wholesaler']], function () {
            // login protected routes.
            Route::get('/wholesaler','wholesalerController@index');
            Route::get('wholesaler/managepart','wholesalerController@managePartview')->name("viewpart");
            Route::post('wholesaler/managepart','wholesalerController@managePartAdd')->name('addpart');
            Route::get('wholesaler/viewparts','wholesalerController@viewAddedpart')->name("viewaddedpart");
            Route::post('wholesaler/viewparts','wholesalerController@updateParts')->name('updatepart');
            Route::get('wholesaler/managestock','wholesalerController@manageStockview')->name("viewstock");
            Route::post('wholesaler/managestock','wholesalerController@managestockAdd')->name('addstock');
            Route::get('wholesaler/viewstocks','wholesalerController@viewAddedstock')->name("viewaddedstock");
            Route::post('wholesaler/viewstocks','wholesalerController@updateStock')->name('updatestock');
            Route::get('wholesaler/partrequests','wholesalerController@partRequestswsHistoryView')->name('partreq');
            Route::post('/wholesaler/partrequests','wholesalerController@updatePartRequestsWs')->name('updatepartrequeststatusws');
            Route::get('wholesaler/changepassword','wholesalerController@changePasswordView')->name('changewspasswordview');
            Route::post('/wholesaler/changepassword','wholesalerController@changePasswordAction')->name('changewspa');
            
            //Route::get('/servicecenter/userrequests','ServiceCenterController@showServiceRequests')->name('ureqview');
            //Route::post('/servicecenter/userrequests','ServiceCenterController@updateServiceRequests')->name('updateservicerequeststatus');
            //Route::post('/servicecenter/userrequestscompletion','ServiceCenterController@completeServiceRequests')->name('completeservicerequest');
            //Route::any('/servicecenter/logout', 'ServiceCenterController@scLogout')->name('sclogout');
            //Route::view('/admin', 'auth.admin');
            //Route::view('/admin/userlist', 'auth.admin');

        });
        //{{ Auth::guard('servicecenter')->user()->centername }}
           
           // Route::get('/home', 'HomeController@index')->middleware('auth');
            //Route::get('/home/servicerequest', 'HomeController@serviceRequestsView')->middleware('auth');
            //Route::any('/home/servicerequest', 'HomeController@createServiceRequest')->middleware('auth')->name('createservicerequest');
           
            //Route::view('/admin', 'auth.admin');
            //Route::view('/admin/userlist', 'auth.admin');

       
    
    
    
    