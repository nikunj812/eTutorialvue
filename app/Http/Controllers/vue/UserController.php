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
 
}
