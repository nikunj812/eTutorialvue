<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Add_Category_Record(Request $req)
    {
    	//dd($req->toArray());
        $cat_data = new Category;
        $cat_data->category_name = $req->category;
        $cat_data->save();

        return redirect('/Add_Category')->with('msg','Category Add Successfully');
    }

    public function View_Category()
    {
    	$cat_data = Category::paginate(2);
        //dd($cat_data->toArray());
    	return view('admin.View_Category',['cat_data'=>$cat_data]);
    }

    public function Delete_Category($cat_id)
    {
       // dd($cat_id);
       Category::where('category_id',$cat_id)->delete();

       return redirect('/View_Category')->with('msg','Category Deleted Successfully');
    }

    public function Edit_Category($id)
    {  
    //dd($cat_id);
       	$data = Category::where('category_id',$id)->first();
     	return view('admin.Edit_Category',['alldata'=>$data]);

    }

    public function Update_Categroy_Record(Request $req)
    {   
    	$id = $req->get('category_id');
        $data = array('category_name'=>$req->get('category_name'));

        Category::where('category_id',$id)->update($data);

       return redirect('/View_Category')->with('msg','Updated Successfully');
    }

    public function searchCategory(request $req)
    {
        // dd($req->toarray());    
        if($req->get('search') != '')
        {
    	$search = $req->get('search');
    	$data = Category::where('category_name','LIKE','%'.$search.'%')->paginate(2)->setpath('');
    	//dd($data->toarray());
    	$data->append(array('search'=>$req->get('search')));
    	return view('admin.View_Category',['cat_data'=>$data]);	
    	}  	
    }

    public function MultipleCatDelete(Request $req)
    {
    	//dd($req->toarray());
    	$ids = $req->get('DataDelete');
    	//dd($id);
    	for($i=0; $i<sizeof($ids); $i++)
    	{
    		$id = $ids[$i];
    		Category::where('category_id',$id)->delete();
       	}

    	return redirect('/View_Category')->with('msg','Category Deleted Successfully');
    }

    public function ActiveStatus($id)
    {
    	//dd($id);
    	$data = array('category_status'=>1);
    	Category::where('category_id',$id)->update($data);
    	echo "1";

    }

    public function DeactiveStatus($id)
    {
    	$data = array('category_status'=>0);
    	Category::where('category_id',$id)->update($data);
    	echo "1";
    }
    
}

