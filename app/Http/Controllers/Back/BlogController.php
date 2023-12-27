<?php

namespace App\Http\Controllers\Back;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category')->orderBy('created_at', 'DESC')->paginate(6);
        return view('back.blog.blog_index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('back.blog.blog_create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "category_id" => "required|integer",
            "title" => "required|max:256",
            "image" => "required",
            "description" => "required",
            "details" => "required"
        ], [
            "category_id.required" => "The category field is required."
        ]);

        $blog = new Blog();

        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title) . '-' . rand(1111, 9999);
        $blog->description = $request->description;
        $blog->details = $request->details;
        $blog->status = $request->status;
        $blog->image = image_template(BLOG_IMAGE, $request->image, null, 800, 323, null);
        $blog->image_sm = image_template(BLOG_IMAGE_SM, $request->image, null, 356, 211, null);
        $blog->image_thumbnail = image_template(BLOG_IMAGE_THUMBNAIL, $request->image, null, 100, 40, null);

        $blog->image_alt = $request->image_alt;
        $blog->keyword = $request->keyword;
        $blog->head_script = $request->head_script;
        $blog->body_script = $request->body_script;
        $blog->custom_html = $request->custom_html;
        $blog->custom_css = $request->custom_css;
        $blog->custom_js = $request->custom_js;

        $blog->save();

        if ($request->tags) {
            $tags = explode(',', $request->tags);
            $tag_ids = [];

            if (count($tags) > 0) {
                foreach ($tags as $key) {
                    $tag_exist = Tag::where('name', trim($key))->first();
                    $tag = new Tag();

                    if ($tag_exist) {
                        $tag = $tag_exist;
                    }

                    $tag->name = trim($key);
                    $tag->slug = Str::slug($key);

                    $tag->save();
                    array_push($tag_ids, $tag->id);
                } 
                $tag_ids;
                $blog->tags()->sync($tag_ids);
            }
        }

        return redirect()->route('back.blog.index')->with('success', 'Blog successfully added.');
    }

    public function edit($slug)
    {
        $categories = Category::all();
        $blogs = Blog::with('tags')->where('slug', $slug)->firstOrFail();

        $tags = $blogs->tags;
        $tag_names = null;

        if (count($tags) > 0) {
            foreach ($tags as $tag) {
                $tag_names .= $tag->name . ',';
            }
        }

        return view('back.blog.blog_edit', compact('blogs', 'categories', 'tag_names'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            "category_id" => "required|integer",
            "title" => "required|max:256",
            "image" => "nullable",
            "description" => "required",
            "details" => "required"
        ], [
            "category_id.required" => "The category field is required."
        ]);

        $blog = Blog::where('slug', $slug)->firstOrFail();

        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title) . '-' . rand(1111, 9999);
        $blog->description = $request->description;
        $blog->details = $request->details;
        $blog->status = $request->status;

        if ($request->image) {
            $blog->image = image_template(BLOG_IMAGE, $request->image, $blog->image, 800, 323, null);
            $blog->image_sm = image_template(BLOG_IMAGE_SM, $request->image, $blog->image_sm, 356, 211, null);
            $blog->image_thumbnail = image_template(BLOG_IMAGE_THUMBNAIL, $request->image, $blog->image_thumbnail, 100, 40, null);
        }

        $blog->image_alt = $request->image_alt;
        $blog->keyword = $request->keyword;
        $blog->head_script = $request->head_script;
        $blog->body_script = $request->body_script;
        $blog->custom_html = $request->custom_html;
        $blog->custom_css = $request->custom_css;
        $blog->custom_js = $request->custom_js;

        $blog->save();

        if ($request->tags) {
            $tags = explode(',', $request->tags);
            $tag_ids = [];
            if (count($tags) > 0) {
                foreach ($tags as $key) {
                    $tag = new Tag();

                    $tag_exist = Tag::where('name', trim($key))->first();
                    if ($tag_exist) {
                        $tag = $tag_exist;
                    }

                    $tag->name = trim($key);
                    $tag->slug = Str::slug($key);

                    $tag->save();
                    array_push($tag_ids, $tag->id);
                }

                $tag_ids;

                $blog->tags()->sync($tag_ids);
            }
        }

        return redirect()->route('back.blog.index')->with('success', 'Blog successfully updated.');
    }

    public function delete(Request $request)
    {
        $blog = Blog::where('id', $request->id)->firstOrFail();

        deleteImg($blog->image);
        deleteImg($blog->image_sm);
        deleteImg($blog->image_thumbnail);

        $blog->delete();

        return redirect()->route('back.blog.index')->with('success', 'Blog deleted successfully.');
    }
}
