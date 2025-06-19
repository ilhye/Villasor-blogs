<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Status;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    // Test function
    public function index()
    {
        $user = "test";

        return 'tina';
    }

    // Create blog post
    public function createBlog(BlogRequest $request)
    {
        // Save blog post in blogs table
        $post = new Blog();
        $post->title = $request->input('title');
        $post->image_url = $request->input('image_url');
        $post->description = $request->input('description');
        $post->category_id = $request->input('category_id');

        // Save author in users table
        $user = new User();
        $user = User::firstOrCreate(['name' => $request->input('author')]); 

        // Save user's table id in authors_id in blogs table
        $post->author_id = $user->id;
        $post->status_id = $request->input('status_id');

        $post->save();
        
        return redirect()->route('newPost')->with('success', 'Post created successfully!');;
    }

    // Home
    public function home()
    {
        $categories = DB::table('categories')->get();
        $statuses = DB::table('statuses')->get();
        return view('pages.newPost', compact('categories', 'statuses'));
    }

    // List of blog categories
    public function getCategory()
    {
        $categories = Category::all();
        return view('pages.category', compact('categories'));
    }

    // List of statuses
    public function getStatus()
    {
        $statuses = Status::all();
        return view('pages.status', compact('statuses'));
    }

    // Soft delete a blog post
    public function softDeleteBlog($id)
    {
        Blog::find($id)->delete();
        return redirect()->back();
    }

    // Get all posts (excluding soft-deleted)
    public function getAllPosts()
    {
        $viewType = 'all';
        $posts = DB::table('blogs as b')
            ->join('categories as c', 'c.id', '=', 'b.category_id')
            ->join('statuses as s', 's.id', '=', 'b.status_id')
            ->select('b.*', 'c.name as category_name', 's.name as status_name')
            ->whereNull('b.deleted_at')
            ->get();
        return view('pages.content', compact('posts', 'viewType'));
    }

    // Get posts by status (excluding soft-deleted)
    public function getPostByStatus($id)
    {
        $viewType = 'byStatus';
        $posts = DB::table('blogs as b')
            ->join('categories as c', 'c.id', '=', 'b.category_id')
            ->join('statuses as s', 's.id', '=', 'b.status_id')
            ->select('b.*', 'c.name as category_name', 's.name as status_name')
            ->where('s.id', $id)
            ->whereNull('b.deleted_at')
            ->get();
        return view('pages.content', compact('posts', 'viewType'));
    }

    // Get posts by category (excluding soft-deleted)
    public function getPostByCategory($id)
    {
        $viewType = 'byCategory';
        $posts = DB::table('blogs as b')
            ->join('categories as c', 'c.id', '=', 'b.category_id')
            ->join('statuses as s', 's.id', '=', 'b.status_id')
            ->select('b.*', 'c.name as category_name', 's.name as status_name')
            ->where('s.id', $id)
            ->whereNull('b.deleted_at')
            ->get();
        return view('pages.content', compact('posts', 'viewType'));
    }

    public function oneToOneRel()
    {
        $blogs = Blog::with('category', 'status')->get();

        return $blogs;
    }

    public function oneToManyRel()
    {
        $categories = Category::with('blog')->find(2);
        return $categories;
    }

    public function manyToManyRel()
    {
        $blogs = Blog::with('tags')->get();
        return $blogs;
    }

    public function insertTags()
    {
        $blog = Blog::findOrFail(3);
        $blog->tags()->attach([1, 2, 3]);
        return $blog;
    }

    public function deleteTags()
    {
        $blog = Blog::findOrFail(3);
        $blog->tags()->detach([1, 2, 3]);
        return $blog;
    }
}
