<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use File;

class ProductController extends Controller
{
    public function Add_Product()
    {
    	$data = Category::where('category_status',1)->get();
        
        return view('Admin.Add_Product',['alldata'=>$data]);
    }

    

    public function Add_Product_Record(Request $req)
    {
    	//dd($req->toarray());

    	if($req->file('product_file'))
    	{
    		$file = $req->file('product_file');
    		$book_name = rand(10000,99999).".".$file->GetClientOriginalExtension();
    		$file->move(public_path('admin/books/'),$book_name);
    	}

    	if($req->file('image'))
    	{
    		$file = $req->file('image');
    		$image_name = rand(10000,99999).".".$file->GetClientOriginalExtension();
    		$file->move(public_path('admin/images/'),$image_name);
    	}
		if($req->file('mimage'))
    	{
    		//dd($req->file('mimage'));
    		foreach($req->file('mimage') as $mfile)
    		{

    			//dd($mfile->toarray());
    		$mimage_name = rand(11111,99999).".".$mfile->GetClientOriginalExtension();
    		$mfile->move(public_path('admin/mimages/'),$mimage_name);
    		$mimg[] = $mimage_name;
    		}
    		$multi_image = implode(",",$mimg);
    	}

    	$data = new Product;
    	$data->product_name = $req->product_name;
    	$data->product_cat_name = $req->get('product_cat_id');
    	$data->product_sub_name = $req->get('product_sub_id');
    	$data->product_desc = $req->get('product_desc');
    	$data->product_file = $book_name;
    	$data->product_image = $image_name;
    	$data->product_mimage = $multi_image;
    	$data->save();

        return redirect('/Add_Product')->with('msg','product data added succesfully');


    }

    public function View_Product()
    {
    	$data = Product::paginate(5);
        //dd($data->toArray());
    	return view('admin.View_Product',['productdata'=>$data]);
    }

	public function get_subcat_record(Request $req){
        $cat_name = $req->get('cat_id');
    	$subcat_record = Subcategory::where('subcat_name',$cat_name)->get();
    	//dd($subcat_record->toArray());
        $subcat_data = "<option value=''>--SELECT_SUBCATEGORY--</option>";
        foreach($subcat_record as $data)
        {
        	$subcat_data .= "<option value=".$data->subcategory_name.">".$data->subcategory_name."</option>";
        }
        echo $subcat_data;
	}

    public function Delete_Productcategory($id)
    {
    	$data = Product::where('product_id',$id)->first();

		$book = public_path()."/admin/books/$data->product_file";
		$book_result = File::exists($book);
				if($book_result)
				{
					File::delete($book);
				}
		
		$path = public_path()."/admin/images/$data->image";
        $result = File::exists($path);
	        
		    	if($result)
		    	{
		   	  	    File::delete($path);
		    	}



		$mpath = public_path()."/admin/mimages/$data->mimage";
		$mresult = File::exists($mpath);

		    	if($mresult)
				{
					File::delete($mpath);
				}
			    	

        Product::where('product_id',$id)->delete();

        return redirect('/View_Product')->with('msg','Product data deleted');
    }

    public function Edit_Productcategory($id)
    {
		$catrecord = Category::where('category_status',1)->get();
        $subRecord = Subcategory::all();
        
        //dd($extraRecord->toarray());
        $data =  Product::where('product_id',$id)->first();
        //dd($data->toarray());
        return view('admin.Edit_Product',['catdata'=>$catrecord,'subcatedata'=>$subRecord, 'alldata'=>$data]);
    }

    public function Update_Product_Record(Request $req)
    {
    	//	dd($req->toarray());

    	//Image 
        	if($req->file('image'))
    		{
    			//dd($req->file('image'));
    			$file = $req->file('image');
    			$image_name = rand(10000,99999).".".$file->getClientOriginalExtension();
    		    $file->move(public_path('admin/images'),$image_name);

    		    //delete image in folder
    			  $id = $req->get('product_id');
    			  $ProductData = Product::where('product_id',$id)->first();

    		   	  $path = public_path()."/admin/images/$ProductData->product_image";
    		   	  $result = File::exists($path);
    	        
    		    	if($result)
    		    	{
    		   	  	    File::delete($path);
    		    	}
    		}
    		else
		{
			$id = $req->get('product_id');
			$productR =  Product::where('product_id',$id)->first();
			$image_name = $productR->product_image;
		}

		//multiple image 
        if($req->file('mimage'))
        {
        	//dd($req->file('mimage'));
        	//$mi = implode(",",$req->file('mimage'));
        	//dd($req->file('mimage'));
        	foreach($req->file('mimage') as $mimg)
        	{
        		$mimage_name = rand(11111,99999).".".$mimg->getClientOriginalExtension();
                $mimg->move(public_path('admin/mimages'),$mimage_name);
                $insert[] = $mimage_name;
                
            }
                //dd($insert);
                $implodeinsert = implode(',',$insert);
                $id = $req->get('product_id');
                $pData = Product::where('product_id',$id)->first();
                //dd($pData->toArray());
                $emimage = explode(',',$pData->product_mimage);
                //dd($emimage);
                foreach($emimage as $dmimage)
                {
                	$path = public_path()."/admin/images/$dmimage";
		   	        $result = File::exists($path);
	        
			    	if($result)
			    	{
			   	  	    File::delete($path);
			    	}

                }
        }
		else{
			$id = $req->get('product_id');
			$productR =  Product::where('product_id',$id)->first();
			$implodeinsert = $productR->product_mimage;
		}

    	$id = $req->get('product_id');
     	$data = array('product_cat_name'=>$req->get('cat_name'), 'product_sub_name'=>$req->get('subcat_name'), 'product_name'=>$req->get('product_name'), 'product_desc'=>$req->get('product_desc'), 'product_image'=>$image_name, 'product_mimage'=>$implodeinsert);

        Product::where('product_id',$id)->update($data);
        return redirect('/View_Product')->with('msg','Product Updated Successfully');
    }

    public function Active_product($id)
    {
    	$data = array('product_status'=>1);
    	Product::where('product_id',$id)->update($data);

    	echo "1";
    }

    public function Deactive_product($id)
    {
    	$data = array('product_status'=>0);
    	Product::where('product_id',$id)->update($data);

    	echo "1";
    }

    public function searchingproduct(Request $req)
    {
    	//dd($req->toarray());
    	if($req->get('search') != "")
    	{
    		$search = $req->get('search');
    		$data = Product::where('product_name','LIKE','%'.$search.'%')->orwhere('product_cat_name','LIKE','%'.$search.'%')->orwhere('product_sub_name','LIKE','%'.$search.'%')->paginate(5)->setpath('');
    		$data->append(array('search'=>$req->get('search')));

            return view('admin.View_Product',['productdata'=>$data]);
    	}
    	$data = Product::paginate(4);
        //dd($data->toArray());
    	return view('admin.View_Product',['productdata'=>$data]);

    }

    public function deleteMultipleProduct(Request $req)
    {
    	//dd($req->toArray());
    	$mdelete = $req->get('DataDelete');

    	for($i=0; $i<sizeof($mdelete); $i++)
    	{
    		$id = $mdelete[$i];
    		$proRec = Product::where('product_id',$id)->first();
    		Product::where('product_id',$id)->delete();
    	}
        return redirect('/View_Product')->with('msg','Delete Multiple Record Success');
    	
    }
}
