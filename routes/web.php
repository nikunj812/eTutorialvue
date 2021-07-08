<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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


//user 
Route::get('/', function () {
    return view('vue_user.index');
});

// Route::get('/',[UserController::class,'fetchdata']);
Route::get('/product/{category}/{subcategory}',[UserController::class,'product'])->middleware('UserCheck');
// Route::get('/about',[UserController::class,'about']);
// Route::get('/contact',[UserController::class,'contact']);
Route::post('/insertuser',[UserController::class,'insertuser']);
// Route::get('/userregister',[UserController::class,'userregister']);
// Route::get('/userlogin',[UserController::class,'userlogin']);
// Route::post('/checklogin',[UserController::class,'checklogin']);
// Route::get('/userlogout', function(){
//     session()->forget('username');
//     return redirect('/userlogin');
// });
// Route::post('/seachproduct',[UserController::class,'searchproduct'])->middleware('UserCheck');
// Route::get('/singlerecord/{id}',[UserController::class,'singlerecord'])->middleware('UserCheck');
// Route::get('/forgetpassword',[UserController::class,'forgetpassword']);
// Route::post('/otpchecker',[UserController::class,'otpchecker']);
// Route::get('/otp_checker',[UserController::class,'otp_checker']);
// Route::post('/checkinsameotp',[UserController::class,'checkinsameotp']);
// Route::get('/newpassword',[UserController::class,'newpassword']);
// Route::post('/PasswordUpdate',[UserController::class,'PasswordUpdate']);






//Admin


//  ADMIN
Route::get('/login', function () {
	if(session()->has('loginData'))
	{
		return redirect('/dashboard');
	}
    return view('admin.AdminLogin');
});
//

Route::post('/CheckAdminLogin',[AdminController::class,'CheckAdminLogin']);
Route::any('/searchAdmin',[AdminController::class,'searchAdmin']);
Route::post('/MultipleDelete',[AdminController::class,'MultipleDelete']);
   
Route::middleware([AdminCheck::class])->group(function(){
   
    Route::get('/dashboard', function (){
    
        return view('admin.dashboard');
    });

    Route::get('/Add_Admin',function(){
    return view('admin.Add_Admin');
    });
    
    Route::get('/View_Admin',[AdminController::class,'View_Admin']);
    Route::post('/Add_Admin_Record',[AdminController::class,'Add_Admin_Record']);
    
    Route::get('/LogOutAdmin', function(){
        session()->forget('loginData');
        return redirect('/login');
    });            
                
    Route::get('/Delete_Admin/{id}',[AdminController::class,'Delete_Admin_Record']);
    Route::get('/Edit_Admin/{id}',[AdminController::class,'Edit_Admin_Record']);
    Route::post('/Update_Admin_Record',[AdminController::class,'Update_Admin_Record']);

});


// //category Routes
Route::get('/Add_Category',function(){
	return view('admin.Add_Category');
});
Route::post('/Add_Category_Record',[CategoryController::class,'Add_Category_Record']);
Route::get('/View_Category',[CategoryController::class,'View_Category']);
Route::get('/Delete_Category/{id}',[CategoryController::class,'Delete_Category']);
Route::get('/Edit_Category/{id}',[CategoryController::class,'Edit_Category']);
Route::post('/Update_Categroy_Record',[CategoryController::class,'Update_Categroy_Record']);
Route::post('/searchCategory',[CategoryController::class,'searchCategory']);
Route::post('/MultipleCatDelete',[CategoryController::class,'MultipleCatDelete']);
//Route::post('/MultipleCatDelete',[CategoryController::class,'MultipleCatDelete']);
Route::get('/ActiveStatus/{id}',[CategoryController::class,'ActiveStatus']);
Route::get('/DeactiveStatus/{id}',[CategoryController::class,'DeactiveStatus']);

// //sub Category

Route::get('/Add_Subcategory',[SubcategoryController::class,'Add_Subcategory']);
Route::post('/Add_Subcategory_Record',[SubcategoryController::class,'Add_Subcategory_Record']);
Route::get('/View_Subcategory',[SubcategoryController::class,'View_Subcategory']);
Route::get('/Delete_Subcategory/{id}',[SubcategoryController::class,'Delete_Subcategory']);
Route::get('/Edit_Subcategory/{id}',[SubcategoryController::class,'Edit_Subcategory']);
Route::post('/Update_Subcategroy_Record',[SubcategoryController::class,'Update_Subcategroy_Record']);
Route::post('/searchSubcategory',[SubcategoryController::class,'searchSubcategory']);
Route::get('/ActiveSubstatus/{id}',[SubcategoryController::class,'ActiveSubstatus']);
Route::get('/DeactiveSubstatus/{id}',[SubcategoryController::class,'DeactiveSubstatus']);
Route::post('/MultipleSubcatDelete',[SubcategoryController::class,'MultipleSubcatDelete']);

// //Product
Route::get('/Add_Product',[ProductController::class,'Add_Product']);
Route::post('/get_type_record',[ProductController::class,'get_type_record']);
Route::post('/get_brand_record',[ProductController::class,'get_brand_record']);
Route::post('/Add_Product_Record',[ProductController::class,'Add_Product_Record']);
Route::get('/View_Product',[ProductController::class,'View_Product']);
Route::post('/get_subcat_record',[ProductController::class,'get_subcat_record']);
Route::get('/Delete_Productcategory/{id}',[ProductController::class,'Delete_Productcategory']);
Route::get('/Edit_Productcategory/{id}',[ProductController::class,'Edit_Productcategory']);
Route::post('/Update_Product_Record',[ProductController::class,'Update_Product_Record']);
Route::get('/Active_product/{id}',[ProductController::class,'Active_product']);
Route::get('/Deactive_product/{id}',[ProductController::class,'Deactive_product']);
Route::post('/searchingproduct',[ProductController::class,'searchingproduct']);
Route::post('/deleteMultipleProduct',[ProductController::class,'deleteMultipleProduct']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('{any}', function(){
    return view('vue_user.index');
})->where('any','.*');