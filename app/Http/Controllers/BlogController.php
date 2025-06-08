<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\MyBlog;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class BlogController extends Controller
{
    // Test function
    public function index()
    {
        $user = "test";

        return view('pages.content', compact('user'));
    }

    // Function to create blog post
    public function createBlog(Request $request)
    {
        $post = new Blog();
        $post->title = $request->input('title');
        $post->image_url = $request->input('image_url');
        $post->description = $request->input('description');
        $post->category_id = $request->input('category_id');
        $post->content = $request->input('content');
        $post->author = $request->input('author');
        $post->status_id = $request->input('status_id');
        $post->save();

        return redirect()->route('home');
    }

    // Get content of specific blog post
    public function getContent($id)
    {
        $posts = DB::table('blogs as b')
            ->join('categories as c', 'c.id', '=', 'b.category_id')
            ->select('b.*', 'c.name as name')
            ->where('b.id', $id)
            ->first();

        return view('pages.content', compact('posts'));
    }

    //Get 2 recent posts, all blog posts, and all categories
    public function getPost()
    {
        $recent = DB::table('blogs')->orderBy('created_at', 'desc')->take(2)->get();
        $categories = DB::table('categories')->get();
        $statuses = DB::table('statuses')->get();
        $posts = DB::table('blogs as b')
            ->join('categories as c', 'c.id', '=', 'b.category_id')
            ->select('b.*', 'c.name as name')
            ->get();

        return view('pages.home', compact('categories', 'posts', 'recent', 'statuses'));
    }

    // Get post by category
    public function getPostsByCategory($name)
    {
        $category = DB::table('categories')->where('name', $name)->first();

        $posts = DB::table('blogs as b')
            ->join('categories as c', 'c.id', '=', 'b.category_id')
            ->where('b.category_id', $category->id)
            ->select('b.*', 'c.name as name')
            ->get();

        return view('pages.categories', compact('category', 'posts'));
    }

    public function blogModel()
    {
        $this->softDelete(11);
    }
    
    public function softDelete($id) {
    }

    // List of statuses
    public function getStatus() {
        $statuses = Status::all();
        return view('pages.status', compact('statuses'));
    }

    // List of blog statuses
    public function getCategory() {
        $categories = Category::all();
        return view('pages.category', compact('categories'));
    }

    // Soft delete a blog post
    public function softDeleteBlog($id) {
        Blog::find($id)->delete();
        return redirect()->back()->with('success', 'Post deleted!');
    }

    // Get all posts
    public function getAllPosts() {
        $posts = Blog::all();
        return view('pages.posts', compact('posts'));
    }
}
