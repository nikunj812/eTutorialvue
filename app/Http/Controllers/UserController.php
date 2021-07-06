<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Extrasubcategory;
use App\Models\Type;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;

class UserController extends Controller
{
   public function fetchdata()
   {
      $categoryData = Category::where('category_status',1)->get(); 	 	
      $subcategoryData = Subcategory::where('subcategory_status',1)->get();
      return view('users.index',['catdata'=>$categoryData, 'subdata'=>$subcategoryData]);
   }

   public function product($category,$subcategory)
   {
      $categoryData = Category::where('category_status',1)->get(); 	 	
      $subcategoryData = Subcategory::where('subcategory_status',1)->get(); 	
      $productData = Product::where('product_cat_name',$category)->where('product_sub_name',$subcategory)->get();    

      return view('users.product',['catdata'=>$categoryData, 'subdata'=>$subcategoryData, 'productdata'=>$productData]);   	 
   }

   public function about()
   {
      $categoryData = Category::where('category_status',1)->get(); 	 	
      $subcategoryData = Subcategory::where('subcategory_status',1)->get();
      return view('users.about',['catdata'=>$categoryData, 'subdata'=>$subcategoryData]);
      
   }

   public function contact()
   {
      $categoryData = Category::where('category_status',1)->get(); 	 	
      $subcategoryData = Subcategory::where('subcategory_status',1)->get();
      return view('users.contact',['catdata'=>$categoryData, 'subdata'=>$subcategoryData]);
   }

  
   public function userregister(){
      $categoryData = Category::where('category_status',1)->get(); 	 	
      $subcategoryData = Subcategory::where('subcategory_status',1)->get();
      return view('users.register',['catdata'=>$categoryData, 'subdata'=>$subcategoryData]);  
   }

   public function insertuser(Request $req)
   {
      
      $users = User::where('email', $req->email)->get();

      # check if email is more than 1
      if(sizeof($users) > 0){
          # tell user not to duplicate same email
          $msg = 'This user already signed up !';
          return back()->with('msg',$msg);
      }
      $user = new User;
      $user->name = $req->name;
      $user->phone = $req->phone;
      $user->email = $req->email;
      $user->password = Hash::make($req->password);
      $user->save();
      return back()->with('msg', 'register successfully !! go to login page');
     
   }

   public function userlogin(){
      if(session()->has('username'))
	{
		return redirect('/');
	}
      $categoryData = Category::where('category_status',1)->get(); 	 	
      $subcategoryData = Subcategory::where('subcategory_status',1)->get();
      return view('users.login',['catdata'=>$categoryData, 'subdata'=>$subcategoryData]);  
   }

  
   public function checklogin(Request $req)
    {
    	$email = $req->get('email');
    	$password = $req->get('password');

        $data = User::where('email',$email)->count();
        if($data == 1)
        {
        	$data = User::where('email',$email)->first();

            if(Hash::check($password, $data->password))
            {
            	$req->session()->put('username',$data);
            	return redirect('/');
            }
            else
            {
            	return redirect('/userlogin')->with('msg',"Password is Wrong");
            }

        }
        else
        {
        	return redirect('/userlogin')->with('msg','Data Not Found');
        }
    }

   public function searchproduct(Request $req){
     // dd($req->toArray());
     $search = $req->get('search');
     if($search != '')
     {
      $categoryData = Category::where('category_status',1)->get(); 	 	
      $subcategoryData = Subcategory::where('subcategory_status',1)->get(); 	
            
        $data = Product::where('product_name','LIKE','%'.$search.'%')->orwhere('product_cat_name','LIKE','%'.$search.'%')->orwhere('product_sub_name','LIKE','%'.$search.'%')->get();
        //dd($data->toArray());
        $data->append(array('search'=>$req->get('search')));

        return view('users.product',['catdata'=>$categoryData, 'subdata'=>$subcategoryData, 'productdata'=>$data]);
     }
   }
   
   public function singlerecord($id){
     // dd($id);
      $categoryData = Category::where('category_status',1)->get(); 	 	
      $subcategoryData = Subcategory::where('subcategory_status',1)->get(); 
      $data = Product::where('product_id',$id)->get();
      return view('users.bookRecord',['catdata'=>$categoryData, 'subdata'=>$subcategoryData, 'productdata'=>$data]);
   }

   public function forgetpassword(){
      $categoryData = Category::where('category_status',1)->get(); 	 	
      $subcategoryData = Subcategory::where('subcategory_status',1)->get(); 
     
      return view('users.passwordreset',['catdata'=>$categoryData, 'subdata'=>$subcategoryData]);
   }

   public function otpchecker(Request $req){
      //dd($req->toArray());
      $email = $req->get('email');
      $data = User::where('email',$email)->count();
     if($data == 1)
     {
      $userdata = User::where('email',$email)->first();
      $to_name = 'Ebook';
      $to_email = $userdata->email;
      $otp = rand(10000,99999);
      $req->session()->put('store_otp_session', $otp);
      $req->session()->put('store_email_session', $to_email);
      $data = array('name'=>$userdata->name, "body" => $otp);

      Mail::send('users.mail', $data, function($message) use ($to_name, $to_email) {
      $message->to($to_email, $to_name)
      ->subject('For Verifying User');
      $message->from('SENDER_EMAIL_ADDRESS','Verify OTP');
      });

      return redirect('/otp_checker')->with('msg','Enter Otp Here!!!!!');

     }
     else
     {
         return redirect('/forgetpassword')->with('msg','Email Not Found');
     }
   }
   
   public function otp_checker(){
      $categoryData = Category::where('category_status',1)->get(); 	 	
      $subcategoryData = Subcategory::where('subcategory_status',1)->get(); 
     
      return view('users.otpCheck',['catdata'=>$categoryData, 'subdata'=>$subcategoryData]);
   }

   public function checkinsameotp(Request $req){
    //echo session()->get('store_otp_session');
    //dd($req->toArray());
      $store_otp = session()->get('store_otp_session');
      $otp = $req->get('otp');

      if($store_otp == $otp)
      {
         return redirect('/newpassword')->with('msg','Add New Password');
      }
      else
      {
         return redirect('/otp_checker')->with('msg','Otp Does Not Match!!!!');
      }
   }

   public function newpassword(){
      $categoryData = Category::where('category_status',1)->get(); 	 	
      $subcategoryData = Subcategory::where('subcategory_status',1)->get(); 
     
      return view('users.newpassword',['catdata'=>$categoryData, 'subdata'=>$subcategoryData]);
   }

   public function PasswordUpdate(Request $req){
   
      $npassword = $req->get('npassword');
      $cpassword = $req->get('cpassword');

      if($npassword == $cpassword)
      {
         $email = session()->get('store_email_session');
         $cpass = Hash::make($npassword);
         $data = array('password'=>$cpass);
         User::where('email',$email)->update($data);

         return redirect('/userlogout')->with('msg','password change successfully');
         
      }
      else
      {
         return redirect('/newpassword')->with('msg','Password Does Not Match');
      }

   
   }

}
