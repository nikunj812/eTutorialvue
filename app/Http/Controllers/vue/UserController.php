<?php

namespace App\Http\Controllers\vue;

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
use Session;
use App\Http\Controllers\Controller as Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
   public function fetchdata()
   {
      $categoryData = Category::where('category_status',1)->get(); 	 	
      $subcategoryData = Subcategory::where('subcategory_status',1)->get();
      return response()->json(['category' => $categoryData, 'subcategory' => $subcategoryData]);
   }

   public function product($category,$subcategory)
   {
      $categoryData = Category::where('category_status',1)->get(); 	 	
      $subcategoryData = Subcategory::where('subcategory_status',1)->get(); 	
      $productData = Product::where('product_cat_name',$category)->where('product_sub_name',$subcategory)->get();    

      return response()->json(['category'=>$categoryData, 'subcategory'=>$subcategoryData, 'product'=>$productData]);   	 
   }

   public function singlerecord($id){  
       $categoryData = Category::where('category_status',1)->get(); 	 	
       $subcategoryData = Subcategory::where('subcategory_status',1)->get(); 
       $data = Product::where('product_id',$id)->get();
       return response()->json(['category'=>$categoryData, 'subcategory'=>$subcategoryData, 'singleData'=>$data]);
    }
    public function register(Request $request)
    {
    	//Validate data
        $data = $request->only('name', 'phone', 'email', 'password');
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:50'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new user
        $user = User::create([
        	'name' => $request->name,
        	'phone' => $request->phone,
        	'email' => $request->email,
        	'password' => bcrypt($request->password)
        ]);

        //User created, return success response
        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], Response::HTTP_OK);
    }
 
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        //valid credential
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is validated
        //Crean token
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                	'success' => false,
                	'status' => 'cred_error',
                	'message' => 'Login credentials are invalid.',
                ], 200);
            }
        } catch (JWTException $e) {
    	return $credentials;
            return response()->json([
                	'success' => false,
                	'status' => 'cred_error',
                	'message' => 'Could not create token.',
                ], 200);
        }

        $user = User::where('email',$request->email)->get();
 		//Token created, return with success response and jwt token
        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => $user,
        ]);
    }
    
    public function searchproduct(Request $req){
        // dd($req->toArray());
        $data = $req->only('search');
        $validator = Validator::make($data, [
            'search' => 'required|string',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        $search = $req->get('search');

        if($search != '')
        {
               
           $data = Product::where('product_name','LIKE','%'.$search.'%')->orwhere('product_cat_name','LIKE','%'.$search.'%')->orwhere('product_sub_name','LIKE','%'.$search.'%')->get();
           //dd($data->toArray());

           if($data->isEmpty()){
               return response()->json(['nodata' => 'No Data Found']);
           }
           return response()->json(['product'=>$data]);
        }
      }

    public function forgetpassword(Request $req){
        //dd($req->toArray());
    $email = $req->get('email');
    $data = User::where('email',$email)->count();
        if($data == 1)
        {
        $userdata = User::where('email',$email)->first();
        $to_name = 'Ebook';
        $to_email = $userdata->email;
        $otp = rand(10000,99999);
        // $req->session()->put('store_otp_session', $otp);
        // session(['store_email_session' => $to_email]);
        // $req->session()->put('store_email_session', $to_email);
        Session::put('store_email_session', $to_email);
       
        $data = array('name'=>$userdata->name, "body" => $otp, 'email' => $to_email);

        Mail::send('users.mail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('For Verifying User');
        $message->from('SENDER_EMAIL_ADDRESS','Verify OTP');
        });

        return response()->json(['otp'=>$data,'message' =>'send mail successfully']);

        }
        else
        {
            return response()->json(['message' =>'send mail successfully']);
        }
    }
    public function checkotp(Request $req)
    {
      $otp = $req->get('otp');
      $store_otp = $req->get('checkotp');

      if($store_otp == $otp)
      {
         return response()->json(['message' =>'Add A New Password']);
      }
      else
      {
         return response()->json(['status'=> 'no','message' =>'Otp Does Not Match!!!!']);
      }
    }

    public function PasswordUpdate(Request $req){
   
        $npassword = $req->get('newpassword');
        $cpassword = $req->get('cnewpassword');
        $email = $req->get('email');
        if($npassword == $cpassword)
        {
           $cpass = Hash::make($npassword);
           $data = array('password'=>$cpass);
           User::where('email',$email)->update($data);
           return response()->json(['message' =>'password change successfully']);
        }
        else
        {
           return response()->json(['status'=> 'no','message' =>'Password Does noy match']);
        }
  
     
     }
 
}
