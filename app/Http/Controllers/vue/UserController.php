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
            'password' => 'required|string|min:6|max:50'
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
    
 
}
