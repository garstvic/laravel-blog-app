<?php

namespace App\Http\Controllers;

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
}