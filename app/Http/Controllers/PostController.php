<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function Index(){
        $posts =DB::table('posts')
        ->join('categories','posts.categoryid','categories.id')
        ->select('posts.*','categories.name','categories.slug')
        ->paginate(2);
        return view('index',compact('posts'));
    }

    public function GivePost(){
    	$category=DB::table('categories')->get();
    	return view('post.givepost',compact('category'));
    }

    public function StorePost(Request $request){
		$validatedData = $request->validate([
        	'title' => 'required|max:225',
        	'details' => 'required|max:925',
        	'image' => 'required|mimes:jpeg,jpg,png,JPG,JPEG,PNG |max:10000',
    	]);

    	$data=array();
    	$data['title']=$request->title;
    	$data['categoryid']=$request->categoryid;
    	$data['details']=$request->details;
    	$image=$request->file('image');
    	if ($image) {
    		$image_name=hexdec(uniqid());
    		$ext=strtolower($image->getClientOriginalExtension());
    		$image_fullname=$image_name.'.'.$ext;
    		$upload_path='public/img/Postimage/';
    		$image_url=$upload_path.$image_fullname;
    		$success=$image->move($upload_path,$image_fullname);
    		$data['image']=$image_url;
    		$post =DB::table('posts')->insert($data);
    		$notification=array(
    			'massage'=>'Successfully Post Updated With Image',
    			'alert-type' =>'success'
    		);
    		return redirect()->back()->with($notification);
    	}else{
    		$post =DB::table('posts')->insert($data);
    		$notification=array(
    			'massage'=>'Successfully Post Updated Without Image',
    			'alert-type' =>'success'
    		);
    		return redirect()->back()->with($notification);
    	}
    }

    public function AllPost(){
    	$posts =DB::table('posts')
    	->join('categories','posts.categoryid','categories.id')
    	->select('posts.*','categories.name','categories.slug')
    	->get();
    	return view('post.allposts',compact('posts'));
    }

    public function ViewPost($id){
        $post =DB::table('posts')
        ->join('categories','posts.categoryid','categories.id')
        ->select('posts.*','categories.name')
        ->where('posts.id',$id)
        ->first();
        return view('post.viewpost')->with('row',$post);
    }

    public function EditPost($id){
        $category=DB::table('categories')->get();
        $post =DB::table('posts')->where('id',$id)->first();
        return view('post.editpost',compact('category','post'));
    }
    public function UpdatePost(Request $request,$id){
        $validatedData = $request->validate([
            'title' => 'required|max:225',
            'details' => 'required|max:925',
            'image' => 'mimes:jpeg,jpg,png,JPG,JPEG,PNG |max:10000',
        ]);

        $data=array();
        $data['title']=$request->title;
        $data['categoryid']=$request->categoryid;
        $data['details']=$request->details;
        $image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_fullname=$image_name.'.'.$ext;
            $upload_path='public/img/Postimage/';
            $image_url=$upload_path.$image_fullname;
            $success=$image->move($upload_path,$image_fullname);
            $data['image']=$image_url;
            unlink($request->oldimage);
            $post =DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'massage'=>'Successfully Post Updated With new Image',
                'alert-type' =>'success'
            );
            return redirect()->route('all.posts')->with($notification);
        }else{
            $data['image']=$request->oldimage;
            $post =DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'massage'=>'Successfully Post Updated With old Image',
                'alert-type' =>'success'
            );
            return redirect()->route('all.posts')->with($notification);
        }
    }

    public function DeletePost($id){
        $post=DB::table('posts')->where('id',$id)->first();
        $image=$post->image;
        $delete =DB::table('posts')->where('id',$id)->delete();
        if ($delete) {
            unlink($image);
            $notification=array(
                'massage'=>'Successfully Post Deleted',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            {
            $notification=array(
                'massage'=>'Post Delete Unsuccessful',
                'alert-type' =>'error'
            );
            return redirect()->back()->with($notification);
        }
        }
    }
}
