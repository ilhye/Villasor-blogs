<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\MyBlog;
use App\Models\Status;
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
        // DB::table('blogs')->insert([
        //     'title' => $request->input('title'),
        //     'image_url' => $request->input('image_url'),
        //     'description' => $request->input('description'),
        //     'category_id' => $request->input('category_id'),
        //     'content' => $request->input('content'),
        //     'author' => $request->input('author'),
        //     'status_id' => $request->input('status_id')
        // ], [
        //     'title' => $request->input('title'),
        //     'image_url' => $request->input('image_url'),
        //     'description' => $request->input('description'),
        //     'category_id' => $request->input('category_id'),
        //     'content' => $request->input('content'),
        //     'author' => $request->input('author'),
        //     'status_id' => $request->input('status_id')
        // ]);

        $post = new Blog();
        $post->title = $request->input('title');
        $post->image_url = $request->input('image_url');
        $post->description = $request->input('description');
        $post->category_id = $request->input('category_id');
        $post->content = $request->input('content');
        $post->author = $request->input('author');
        $post->status_id = $request->input('status_id');
        $post->save();
        // dd($post->id);

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

    // Get 2 recent posts, all blog posts, and all categories
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
        //return Blog::all();
        // return Status::all();
        // return MyBlog::all(); 
        // $blog = Blog::find(1);
        // return $blog;
        // return $blog->title;
        // return $blog->title . " - " .$blog->description;
        // return Blog::findOrFail(5);
        // $post = Blog::where('status_id', 1)
        //    ->get();
        // $post = Blog::where('status_id', 1)
        //     ->where('category_id', 1)
        //     ->get();
        // $post = Blog::find(1)->delete(1);

        //$post = Blog::findOrFail(11)->delete(1);
        $this->softDelete(11);
        // return $post;
        //$blogs = Blog::all();
        // return $blogs;
    }
    
    public function softDelete($id) {
        // Blog::onlyTrashed()->findOrFail($id)->forceDelete();
        // Blog::onlyTrashed()->findOrFail($id)->restore();
    }
}
