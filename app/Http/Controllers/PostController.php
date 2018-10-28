<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function getBlogIndex($side = 'frontend')
    {
        // Fetch Posts and Paginate
        return view($side . '.blog.index');
    }   
    
    public function getSinglePost($post_id, $side = 'frontend')
    {
        // Fetch the post
        return view($side . '.blog.index');
    }
    
    public function getCreatePost()
    {
        return view('admin.blog.create_post');
    }
    
    public function postCreatePost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:120|unique:posts',
            'author' => 'required|max:80',
            'body' => 'required'
        ]);
        
        $post = new Post();
        $post->title = $request['title'];
        $post->author = $request['author'];
        $post->body = $request['body'];
        $post->save();
        
        // Attaching categories
        
        return redirect()->route('admin.index')->with(['success' => 'Post successfully created!']);
    }
}