<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        DB::table('blogs')->insert([
            'title' => $request->input('title'),
            'image_url' => $request->input('image_url'),
            'description' => $request->input('description'),
            'categories_id' => $request->input('categories_id'),
            'content' => $request->input('content'),
            'author' => $request->input('author'),
            'created_at' => $request->input('created_at'),
            'status_id' => $request->input('status_id')
        ]);

        return redirect()->route('home');
    }

    // Get content of specific blog post
    public function getContent($id)
    {
        $posts = DB::table('blogs as b')
            ->join('categories as c', 'c.id', '=', 'b.categories_id')
            ->select('b.*', 'c.name as name')
            ->where('b.id', $id)
            ->first();

        return view('pages.content', compact('posts'));
    }

    // Get 2 recent posts, all blog posts, and all categories
    public function getPost()
    {
        $recent = DB::table('blogs')->orderBy('created_at', 'desc')->take(2)->get();
        $categories = DB::table('categories')->get();
        $statuses = DB::table('statuses')->get();
        $posts = DB::table('blogs as b')
            ->join('categories as c', 'c.id', '=', 'b.categories_id')
            ->select('b.*', 'c.name as name')
            ->get();

        return view('pages.home', compact('categories', 'posts', 'recent', 'statuses'));
    }

    // Get post by category
    public function getPostsByCategory($name)
    {
        $category = DB::table('categories')->where('name', $name)->first();

        $posts = DB::table('blogs as b')
            ->join('categories as c', 'c.id', '=', 'b.categories_id')
            ->where('b.categories_id', $category->id)
            ->select('b.*', 'c.name as name')
            ->get();
            
        return view('pages.categories', compact('category','posts'));
    }
}
