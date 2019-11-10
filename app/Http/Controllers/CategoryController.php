<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function AddCategory(){
    	return view('category.addcategory');
    }

    public function StoreCategory(Request $request){
		$validatedData = $request->validate([
        	'name' => 'required|unique:categories|max:25|min:4',
        	'slug' => 'required|unique:categories|max:25|min:4',
    	]);

    	$data=array();
    	$data['name']=$request->name;
    	$data['slug']=$request->slug;
    	$data['status']=$request->input('status');
    	$category =DB::table('categories')->insert($data);
    	//return response()->json($data);
    	if ($category) {
    		$notification=array(
    			'massage'=>'Successfully Category Inserted',
    			'alert-type' =>'success'
    		);
    		return redirect()->route('all.category')->with($notification);
    	}
    	else{
    		$notification=array(
    			'massage'=>'Category Insertion Unsuccessful',
    			'alert-type' =>'error'
    		);
    		return redirect()->back()->with($notification);
    	}
    }

    public function AllCategory(){
    	$category =DB::table('categories')->get();
    	return view('category.allCategory',compact('category'));
    }

    public function ViewCategory($id){
    	$category =DB::table('categories')->where('id',$id)->first();
    	return view('category.viewcategory')->with('cat',$category);
    }

    public function ViewUpdateCategory($id){
        $category =DB::table('categories')->where('id',$id)->first();
        return view('category.viewupdatecategory')->with('cat',$category);
    }

    public function StoreUpdateCategory(Request $request,$id){
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:4',
            'slug' => 'required|unique:categories|max:25|min:4',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $data['status']=$request->input('status');
        $category =DB::table('categories')->where('id',$id)->update($data);
        //return response()->json($data);
        if ($category) {
            $notification=array(
                'massage'=>'Successfully Category Updated',
                'alert-type' =>'success'
            );
            return redirect()->route('all.category')->with($notification);
        }
        else{
            $notification=array(
                'massage'=>'Category Update Unsuccessful',
                'alert-type' =>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function DeleteCategory($id){
    	$delete =DB::table('categories')->where('id',$id)->delete();
    	if ($delete) {
    		$notification=array(
    			'massage'=>'Successfully Category Deleted',
    			'alert-type' =>'success'
    		);
    		return redirect()->back()->with($notification);
    	}
    }
}
