<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    public function Add_Subcategory()
    {
       $data = Category::where('category_status',1)->get();
       //dd($data->toarray());
       return view('admin.Add_Subcategory',['alldata'=>$data]);
    }

    public function Add_Subcategory_Record(request $req)
    {
    	$sub_data = new Subcategory;
    	$sub_data->subcategory_name = $req->Subcategory;
    	$sub_data->subcat_name = $req->category;
    	$sub_data->save();

    	return redirect('/Add_Subcategory')->with('msg','SubCategory Added Successfully');
    }

    public function View_Subcategory()
    {
    	$data = Subcategory::paginate(2);
    	//dd($data->toarray());
    	return view('admin.View_Subcategory',['subcat_data'=>$data]);
    }

    public function Delete_Subcategory($id)
    {
    	Subcategory::where('subcategory_id',$id)->delete();

        return redirect('/View_Subcategory')->with('msg','Subcategory Deleted Successfully');
    }

    public function Edit_Subcategory($id)
    {  
    //dd($cat_id);
    	$datacat = Category::where('category_status',1)->get();
    	//dd($datacat);
       	$data = Subcategory::where('subcategory_id',$id)->first();
       	//dd($data->toarray());
     	return view('admin.Edit_Subcategory',['alldata'=>$data,'catdata'=>$datacat]);

    }

    public function Update_Subcategroy_Record(Request $req)
    {   
    	$id = $req->get('subcategory_id');
    	$data = array('subcat_name'=>$req->subcat_name,'subcategory_name'=>$req->subcategory_name);
    	Subcategory::where('subcategory_id',$id)->update($data);

    	return redirect('/View_Subcategory')->with('msg','Updated Subcategory Successfully');
    }

    public function searchSubcategory(Request $req)
    {
    	//dd($req->toarray());
    	if($req->get('search') != '')
    	{
    		$search = $req->get('search');
    		$data = Subcategory::where('subcategory_name','LIKE','%'.$search.'%')->orwhere('subcat_name','LIKE','%'.$search.'%')->paginate(2)->setpath('');
    		//dd($data);
    		$data->append(array('search' =>$req->get('search')));
    		
    		return view('admin.View_Subcategory',['subcat_data'=>$data]);
        }

        $data = Subcategory::paginate(2);
    	//dd($data->toarray());
    	return view('admin.View_Subcategory',['subcat_data'=>$data]);
    }

    public function ActiveSubstatus($id)
    {
    	$data = array('subcategory_status'=>1);
    	Subcategory::where('subcategory_id',$id)->update($data);
    	echo "1";
    }

    public function DeactiveSubstatus($id)
    {
    	$data = array('subcategory_status'=>0);
    	Subcategory::where('subcategory_id',$id)->update($data);
    	echo "1";
    }

    public function MultipleSubcatDelete(Request $req)
    {
    	$mdelete = $req->get('DataDelete');
    	for($i=0; $i<sizeof($mdelete); $i++)
    	{
    		$id = $mdelete[$i];
    		Subcategory::where('subcategory_id',$id)->delete();

    	}
    	return redirect('/View_Subcategory')->with('msg','Multiple Delete Successfully!!!');
    }


}
