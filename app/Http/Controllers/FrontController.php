<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $slider = Slider::all();

        $blogs = Blog::with('category')
            ->where('status', STATUS_MSG[0])
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $popular_posts = Blog::where('status', STATUS_MSG[0])
            ->inRandomOrder()
            ->limit(3)
            ->get();

        $popular_tags = Tag::with('blog')
            ->inRandomOrder()
            ->limit(5)
            ->get();

        return view('welcome', compact(array('categories', 'slider', 'blogs', 'popular_posts', 'popular_tags')));
    }

    public function blog($slug)
    {
        $categories = Category::all();

        // $category = Category::with('blog')->where('slug', $slug)->first();
        $category = Category::where('slug', $slug)->firstOrFail();

        $blogs = Blog::where('category_id', $category->id)
            ->where('status', STATUS_MSG[0])
            ->orderBy('created_at', 'DESC')
            ->paginate(4);

        $popular_posts = Blog::where('status', STATUS_MSG[0])
            ->inRandomOrder()
            ->limit(3)
            ->get();

        $popular_tags = Tag::with('blog')
            ->inRandomOrder()
            ->limit(5)
            ->get();

        return view('front.blog', compact(
            'categories',
            'category',
            'blogs',
            'popular_posts',
            'popular_tags'
        ));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function single_blog($slug)
    {
        $categories = Category::all();

        $popular_posts = Blog::where('status', STATUS_MSG[0])
            ->inRandomOrder()
            ->limit(3)
            ->get();

        $blog = Blog::with(['category', 'tags'])->where('slug', $slug)->firstOrFail();

        $comments = Comment::where('status', STATUS_MSG[0])
            ->where('parent_id', 0)
            ->where('blog_id', $blog->id)
            ->with('replies')
            ->get();

        $tags = $blog->tags;
        // $popular_tags = Tag::with('blog')
        //     ->inRandomOrder()
        //     ->limit(5)
        //     ->get();

        $prev_post = Blog::where('status', 'Active')
            ->where('id', '<', $blog->id)
            ->orderBy('created_at', 'desc')
            ->first(['title', 'slug']);

        $next_post = Blog::where('status', 'Active')
            ->where('id', '>', $blog->id)
            ->orderBy('created_at', 'DESC')
            ->first(['title', 'slug']);

        $related_blogs = Blog::where('status', 'Active')
            ->where('category_id', $blog->category_id)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('front.single_blog', compact(
            'categories',
            'popular_posts',
            'blog',
            'prev_post',
            'next_post',
            'tags',
            'related_blogs',
            'comments'
        ));
    }

    function comment_area (Request $request){
        $request->validate([
            'name' => 'required|max:256',
            'email' => 'required|email',
            'comment' => 'required',
            'blog_id' => 'required|integer',
            'parent_id' => 'required|integer'
        ]);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->blog_id = $request->blog_id;
        $comment->parent_id = $request->parent_id;
        $comment->save();

        return redirect()->back()->with([
            'success' => 'your comment has been successfully uploaded',
            'name' => $request->name,
            'email' => $request->email
        ]);
    }
}
