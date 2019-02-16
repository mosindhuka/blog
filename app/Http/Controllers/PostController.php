<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Session;

class PostController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
	
	public function __construct() {
		
		  $this->middleware('CheckAuth');

		 
	}
	
	
    public function index(Request $request)
    {
		
		$user_id = $request->session()->get('user_id');
		$role = $request->session()->get('role');
		
		/*if($role==1)
		{
			$posts = Post::all();
		}
		else
		{
			$posts = Post::where('user_id',$user_id)->get();
			
		}*/
		$posts = Post::all();
	
        return view('post_list',['data'=>$posts]);

    }
	
	public function edit($id)
    {		
			$post = Post::where('id',$id)->get()->first();
			
			return view('edit_post',['data'=>$post]);
    }
	
	public function update(Request $request)
	{
		 $validator = Validator::make($request->all(), [
           'title' => 'required',
           'body' => 'required'
       ]);

		  if ($validator->fails()) {
            return redirect('post/edit/'.$request->id)
                        ->withErrors($validator)
                        ->withInput();
        }
		// The blog post is valid...
		 /*$post = new Post;

		$post->user_id = $request->session()->get('user_id');
        $post->title = $request->title;
		$post->body = $request->body;

        $post->save();
		*/
		
		$post = Post::find($request->id);

		$post->title = $request->title;
		$post->body = $request->body;

		$post->save();
		
		return redirect('post');
		
	}
	
	public function add()
    {
        return view('add_post');
    }
	
	public function store(Request $request)
	{
		 $validator = Validator::make($request->all(), [
           'title' => 'required',
           'body' => 'required'
       ]);

		  if ($validator->fails()) {
            return redirect('post/add')
                        ->withErrors($validator)
                        ->withInput();
        }
		// The blog post is valid...
		 $post = new Post;

		$post->user_id = $request->session()->get('user_id');
        $post->title = $request->title;
		$post->body = $request->body;

        $post->save();
		
		return redirect('post');
		
	}

}
