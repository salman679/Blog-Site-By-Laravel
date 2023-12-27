<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\slider;
use App\Models\Category;


class ApiController extends Controller
{
    function sliders()
    {
        $slider = slider::get();
        return response()->json($slider);
    }

    function blogs()
    {
        $blogs = Blog::with(['category' => function ($query) {
            $query->select(['id', 'name', 'slug']);
        }])
            ->where('status', STATUS_MSG[0])
            ->orderBy('created_at', 'DESC')
            ->paginate (8, ['category_id', 'title', 'slug', 'description', 'image', 'created_at']);

        return response()->json($blogs);
    }

    function category(){
        // $categories = Category::with('blog');
        $categories = Category::with(['blog'=>function ($query){
            $query->select(['category_id', 'id']);
        }])->get();
        
        return response()->json($categories);
    }

    function singleBlog($slug) {
        $blog = Blog::where('slug', $slug)
        ->with(['category' => function ($query){
            $query->select(['id', 'title', 'slug']);
        }])
        ->firstOrFail();

        return response()->json($blog);
    }
}