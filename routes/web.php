<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClassificationController;
use App\Http\Controllers\Admin\PropertiesController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AllPropertiesController;
use App\Http\Controllers\Admin\HouseandlotController;
use App\Http\Controllers\Admin\BoardinghouseController;
use App\Http\Controllers\Admin\LotController;
use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\User\HouseController;
use App\Http\Controllers\User\PageController;
use App\Http\Controllers\User\BoardingController;
use App\Http\Controllers\User\UsersLotController;
use App\Http\Controllers\User\RequestPropertiesController;
use App\Http\Controllers\Admin\ApprovePropertyController;
use App\Http\Controllers\Admin\ReportCOntroller;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\BotmanController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
//Authentication for users if authenticated theyy will be redirected to their respected pages
Route::middleware(['preventBackHistory'])->group(function(){
    Auth::routes(['verify' => true]);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

// Landing Page of the system 
// Route::get('/',[ViewController::class,'homepage'])->name('homepage');
// Route::get('',[ViewController::class,'about'])->name('pages.aboutUs');
Route::get('contact',[ViewController::class,'contact'])->name('pages.contactUs');
Route::get('policy',[ViewController::class,'agent'])->name('pages.agents');
// Route::get('buy-sale-rent',[ViewController::class,'buysalerent'])->name('buysalerent');
// Route::get('/property details/{name}',[ViewController::class,'show']);
// Route::get('/homepage',[MapController::class,'map']);  //Sample of displaying a map
Route::get('/landing',[PageController::class,'homePage'])->name('homePage');
Route::get('terms and conditions',[App\Http\Controllers\Auth\RegisterController::class,'terms'])->name('terms.and.conditions');
Route::get('/',[LandingpageController::class,'landingpage'])->name('landingpage');
Route::get('/view property/{id}/{catID}',[LandingpageController::class,'viewDetails'])->name('view.details');
Route::get('view/{slug}/category/',[LandingpageController::class,'viewCategory'])->name('view.categories');
Route::get('search',[SearchController::class,'search'])->name('search');
Route::post('feedback',[FeedbackController::class,'feedback'])->name('feedback');
Route::match(['get', 'post'], '/botman', [BotManController::class,'handle']);
// Report
Route::get('report/{id}/{name}',[FeedbackController::class,'report'])->name('report');
Route::post('report a problem',[FeedbackController::class,'reportCause'])->name('problem');

// LANDING PAGE
Route::get('/all property locations',[LandingpageController::class,'showMap'])->name('showMap');
#############################################################################################################
#############################################################################################################
#############################################################################################################

//Admin Dashboard
Route::middleware(['auth','isAdmin','preventBackHistory', 'verified'])->group(function(){
    //Admin Dashboard
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');

    ##User Profile
    Route::get('profile',[AdminController::class,'editProfile'])->name('adminProfile');
    Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
    Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
    Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');

    ##Category 
    Route::get('categories',[CategoryController::class,'index']);
    Route::get('add-category',[CategoryController::class,'add']);
    Route::post('insert-category',[CategoryController::class,'insert']);
    Route::get('edit-category/{id}',[CategoryController::class,'edit']);
    Route::put('update-category/{id}',[CategoryController::class,'update']);
    // Route::get('delete-category/{id}',[CategoryController::class,'delete']);

    ##Classification
    Route::get('/classification',[ClassificationController::class,'index']);
    Route::get('/add-classification',[ClassificationController::class,'create']);
    Route::post('/store-classification',[ClassificationController::class,'store']);
    
    ##Properties
    Route::get('/properties',[PropertiesController::class,'index'])->name('allProperties');
   
    //Choosing a Category
    Route::get('/choose category',[AllPropertiesController::class,'chooseCategory'])->name('chooseCate');

    //House and Lot Routes
    Route::get('/house and lot',[HouseandlotController::class,'addHouseLot'])->name('addHouseAndLot');
    Route::post('/create house and lot',[HouseandlotController::class,'store'])->name('storeHouse');
    Route::get('edit my house property/{id}',[HouseandlotController::class,'editHouse'])->name('editHouse');
    Route::put('update houseandlot/{id}',[HouseandlotController::class,'updateHouse'])->name('updateHouse');
    // Delete Routes for all kinds of property
    Route::get('delete house/{id}',[HouseandlotController::class,'destroy'])->name('deleteHouse');
    
    //Boarding House Routes
    Route::get('/boarding house',[BoardinghouseController::class,'create'])->name('addBoarding');
    Route::post('/create boarding',[BoardinghouseController::class,'store'])->name('storeBoarding');
    Route::get('edit boardinghouse/{id}',[BoardinghouseController::class,'edit'])->name('editBoarding');
    Route::put('update boarding/{id}',[BoardinghouseController::class,'update'])->name('updateBoard');

    //Lot Routes
    Route::get('/lot',[LotController::class,'addLot'])->name('addLot');
    Route::post('/create lot',[LotController::class,'storeLot'])->name('storeLot');
    Route::get('/edit lot/{id}',[LotController::class,'editLot']);
    Route::put('/update lot/{id}',[LotController::class,'updateLot']);
    //Maps Locations
    Route::get('maps',[MapController::class,'mapLocations']);
    // Users List
    Route::get('users list',[AdminController::class,'usersList'])->name('usersList.index');
    // Route::get('delete user/{id}',[UserController::class,'delete']);

    //Locations 
    Route::get('locations',[AdminController::class,'locations'])->name('locations');
    
    //Send Email Notification 
    Route::get('/send email notification',[SendEmailController::class,'sendEmail'])->name('sendEmail');


    //Route of Pended Properties need to be reviewed by the admin 
    // Route::get('/pended properties',[AdminController::class,'pendingProperties'])->name('pendedProp');
    // Route::get('/delete request/{id}',[AdminController::class,'deleteRequest']);

    // Route::get('/approve property house/{id}',[ApprovePropertyController::class,'approveHouse']);
    // Route::get('approve property boarding house/{id}',[ApprovePropertyController::class,'approveBoard']);
    // Route::get('/approve this lot/{id}',[ApprovePropertyController::class,'approveLot']);
    // Route::get('/view request house and lot/{id}',[ApprovePropertyController::class,'viewReqHouse'])->name('view.req.house');
    // Route::get('/view request boarding house/{id}',[ApprovePropertyController::class,'viewReqBoarding'])->name('view.req.boarding');
    // Route::get('/view request lot/{id}',[ApprovePropertyController::class,'viewReqLot'])->name('view.req.lot');
    
    Route::get('view all properties',[AdminController::class,'viewProperties'])->name('admin.properties.all');
    // Search 
    Route::get('/search property',[SearchController::class,'adminSearch'])->name('search.property');
    Route::get('/view house and lot/{id}',[SearchController::class,'viewHouse'])->name('view.house');
    Route::get('/view boarding house/{id}',[SearchController::class,'viewBoarding'])->name('view.boarding');
    Route::get('/view lot/{id}',[SearchController::class,'viewLot'])->name('view.lot');

    //User Verification Route
    Route::get('list of unverified users',[App\Http\Controllers\Auth\VerificationController::class,'viewUnverifiedAccount'])->name('viewUnverifiedAccount');
    Route::get('view unverified users/{id}/',[App\Http\Controllers\Auth\VerificationController::class,'viewUserAccount'])->name('viewUnverifiedUser');
    Route::get('verify users/{id}/{verID}/',[App\Http\Controllers\Auth\VerificationController::class,'verifyUser'])->name('verifyUser');
    Route::get('delete unverified users/{id}/',[App\Http\Controllers\Auth\VerificationController::class,'delete'])->name('rejectUnverifiedUser');

    // Report
    Route::get('view reported property/{id}/{propID}/',[ReportCOntroller::class,'viewReport'])->name('viewReport');
    Route::get('warned user/{id}/{propID}/',[ReportCOntroller::class,'warnedUser'])->name('warnedUser');
    Route::get('delete report/{id}/',[ReportCOntroller::class,'deleteReport'])->name('deleteReport');    
    Route::get('delete reported property/{propID}/',[ReportCOntroller::class,'deleteReportProperty'])->name('deleteReportProperty');    
    
});

Route::get('/exportPDF',[AdminController::class,'toPDF']);
Route::get('/propPDF',[AdminController::class,'propertylist']);


#############################################################################################################
#############################################################################################################
#############################################################################################################
Route::middleware(['auth','isSeller','preventBackHistory','verified'])->group(function(){
    Route::get('account_verification',[App\Http\Controllers\User\FullyVerifiedController::class,'verify'])->name('verify.account');
    Route::post('verifying users account',[App\Http\Controllers\User\FullyVerifiedController::class,'verifiedAccount'])->name('verify-now');
});

//User middleware For guest users 
Route::middleware(['auth','isSeller','preventBackHistory','verified','fullyVerified'])->group(function(){
    Route::get('my properties',[UserController::class,'myProperties'])->name('myProperties');   
    // Route::get('my request properties',[UserController::class,'reqProperties'])->name('view.request.prop');
    Route::get('delete-property/{id}',[UserController::class,'destroy']);
    // Route::get('delete-property/{id}',[UserController::class,'delete'])->name('delete.request');
    //House and Lot
    Route::get('/create new house',[HouseController::class,'add'])->name('user.houseandlot.add');
    //Route::get('/create new house',[RequestPropertiesController::class,'addHouse'])->name('user.houseandlot.add');
    Route::post('/adding-new-house',[HouseController::class,'store'])->name('user.houseandolot.store');
    // Route::post('/adding-new-house',[RequestPropertiesController::class,'storeHouse'])->name('user.houseandolot.store');
    Route::get('/edit this house/{id}',[HouseController::class,'edit']);
    Route::put('/update this house/{id}',[HouseController::class,'update']);
   
    //Boarding House
    Route::get('/create new boarding house',[BoardingController::class,'add'])->name('user.boarding.add');
    // Route::get('/create new boarding house',[RequestPropertiesController::class,'addBoarding'])->name('user.boarding.add');    
    Route::post('/add boarding house',[BoardingController::class,'store'])->name('user.boarding.store');
    // Route::post('/add boarding house',[RequestPropertiesController::class,'storeBoarding'])->name('user.boarding.store');
    Route::get('/edit this boarding house/{id}',[BoardingController::class,'edit'])->name('user.boarding.edit');
    Route::put('/update this boarding house/{id}',[BoardingController::class,'update']);
   
    //Lot
    Route::get('/create new lot',[UsersLotController::class,'add'])->name('user.lot.add');
    // Route::get('/create new lot',[RequestPropertiesController::class,'addLot'])->name('user.lot.add');
    Route::post('/add lot',[UsersLotController::class,'storeLot'])->name('user.lot.store');
    // Route::post('/add lot',[RequestPropertiesController::class,'storeLot'])->name('user.lot.store');
    Route::get('/edit this lot/{id}',[UsersLotController::class,'edit']);
    Route::put('/update this lot/{id}',[UsersLotController::class,'update']);
    
    //User Profile
    Route::get('/user-profile',[UserController::class,'profile'])->name('userProfile');
    Route::post('update-user-profile',[UserController::class,'updateProfile'])->name('updateUserInfo');
    Route::post('update-profile-picture',[UserController::class,'updateProfilePicture'])->name('updateUserPicture');
    Route::post('change-user-password',[UserController::class,'changePassword'])->name('userChangePassword');
    Route::get('/view mail', function(){ return view('emails.welcome'); });

    Route::get('create new houses',[RequestPropertiesController::class,'create'])->name('createNewProp');

    
});

