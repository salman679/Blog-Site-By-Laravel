<?php

namespace App\Http\Controllers\Back;

use App\Models\Blog;
use App\Models\Category;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('admin');
    }

    public function category()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('back.category.category', compact('categories'));
    }

    public function create()
    {
        return view('back.category.create_category');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:256',
        ]);

        $category = new Category();

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        $category->title = $request->title;
        $category->description = $request->description;
        $category->keyword = $request->keyword;
        $category->head_script = $request->head_script;
        $category->body_script = $request->body_script;

        $category->save();

        return redirect()->route('back.category.index')->with('success', 'Category has successfully added.');
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        return view('back.category.edit_category', compact('category'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|max:256'
        ]);

        $category = Category::where('slug', $slug)->firstOrFail();

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        $category->title = $request->title;
        $category->description = $request->description;
        $category->keyword = $request->keyword;
        $category->head_script = $request->head_script;
        $category->body_script = $request->body_script;

        $category->save();

        return redirect()->route('back.category.index')->with('success', 'Category updated successfully.');
    }

    public function delete(Request $request)
    {
        $category = Category::where('slug', $request->slug)->firstOrFail();

        $blogs = Blog::where('category_id', $category->id)->get();

        foreach ($blogs as $blog) {
            deleteImg($blog->image);
            deleteImg($blog->image_sm);
            deleteImg($blog->image_thumbnail);

            $blog->delete();
        }

        $category->delete();

        return redirect()->route('back.category.index')->with('success', 'Category removed successfully.');
    }
}
