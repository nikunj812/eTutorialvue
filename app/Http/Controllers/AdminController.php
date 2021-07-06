<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use File;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function Add_Admin_Record(Request $req){
        
        $admin = new Admin;
         
        if($req->file('image')){
           $file = $req->file('image');
           $image_name = rand(10000,99999).".".$file->getClientOriginalExtension();
           $file->move(public_path('admin/images'),$image_name);
           $admin->image = $image_name;
       	}

	    $fname = $req->fname;
	    $lname = $req->lname; 	
	    $admin->name = $req->fname." ".$req->lname;
	    $admin->email = $req->email;
	    $admin->password = bcrypt($req->password);
	    $admin->gender = $req->gender;
	    $admin->education = implode('-',$req->education);
	    $admin->city = $req->city; 
        
       	$admin->save();

        return redirect('/userregister')->with('msg','Admin Record Add Successfully');
      
       
    }

    public function View_Admin(){
     	$data = Admin::paginate(2);

     	return view('admin.View_Admin',['allData'=>$data]);
    }

 	public function Delete_Admin_Record($id)
 	{
	    $AdminData = Admin::find($id)->first();
	    $path = public_path()."/admin/images/$AdminData->image";
        $result = File::exists($path);
	        
		    	if($result)
		    	{
		   	  	    File::delete($path);
		    	}
		Admin::find($id)->delete();
 		return redirect('/View_Admin')->with('msg','Admin Record Data Delete Successfully');
	}

	public function Edit_Admin_Record($id)
	{   
     	$data = Admin::find($id);
     	return view('admin.Edit_Admin',['alldata'=>$data]);
	}

	public function Update_Admin_Record(Request $req)
	{
		if($req->file('image'))
		{
			$file = $req->file('image');
			$image_name = rand(10000,99999).".".$file->getClientOriginalExtension();
		    $file->move(public_path('admin/images'),$image_name);

		    //delete image in folder
			  $id = $req->admin_id;
			  $AdminData = Admin::find($id)->first();

		   	  $path = public_path()."/admin/images/$AdminData->image";
		   	  $result = File::exists($path);
	        
		    	if($result)
		    	{
		   	  	    File::delete($path);
		    	}
		}
		else
		{
			$id = $req->admin_id;
			$adminR = Admin::find($id)->first();
			$image_name = $adminR->image;
		}
	      	$name = $req->fname." ".$req->lname;
	        $education = implode('-',$req->education);

	      	$alldata = array('name'=>$name,'email'=>$req->email,'gender'=>$req->gender,'education'=>$education,'city'=>$req->city,
	      		'image'=>$image_name);

	      	$id = $req->admin_id;
	      	Admin::where('id',$id)->update($alldata);
	      	return redirect('/View_Admin')->with('msg',"Admi Record Update Successfully");
	}

    
    public function CheckAdminLogin(Request $req)
    {
    	$email = $req->get('email');
    	$password = $req->get('password');

        $data = Admin::where('email',$email)->count();
        
        if($data == 1)
        {
        	$data = Admin::where('email',$email)->first();
            if(Hash::check($password, $data->password))
            {
            	$req->session()->put('loginData',$data);
            	return redirect('/dashboard');
            }
            else
            {
            	return redirect('/login')->with('msg',"Password is Wrong");
            }

        }
        else
        {
        	return redirect('/login')->with('msg','Data Not Found');
        }
    }
   
   public function searchAdmin(Request $req)
   {
   	$search = $req->get('search');

   	if($search != '')
   	{
   		$data = Admin::where('name','LIKE','%'.$search.'%')->orwhere('email','LIKE','%'.$search.'%')->paginate(2)->setpath('');
   		$data->append(array('search'=>$req->get('search')));

   		return view('admin.View_Admin',['allData'=>$data]);
   	}

   	    $data = Admin::paginate(2);
   		return view('admin.View_Admin',['allData'=>$data]);
   }

   public function MultipleDelete(Request $req)
   {
   	 $mdelete = $req->get('DataDelete');
   	
   	 for($i=0;$i<sizeof($mdelete);$i++)
   	 {  
   	 	      $id = $mdelete[$i];
			  $AdminData = Admin::find($id)->first();

		   	  $path = public_path()."/admin/images/$AdminData->image";
		   	  $result = File::exists($path);
	        
		    	if($result)
		    	{
		   	  	    File::delete($path);
		    	}
   	 	Admin::where('id',$id)->delete();
   	 }
   	 return redirect('/View_Admin')->with('msg',"Deleted Data");
    }
}
