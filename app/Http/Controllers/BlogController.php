<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Http\Requests\CommentRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Status;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $post = new Blog();
        $post->title = $request->input('title');
        $post->image_url = $request->input('image_url');
        $post->description = $request->input('description');
        $post->category_id = $request->input('category_id');

        $user = new User();
        $user = User::firstOrCreate(['name' => $request->input('author')]);

        $post->author_id = $user->id;
        $post->status_id = $request->input('status_id'); 
        
        $post->save();

        $tags = $request->input('tags', []);
        $post->tags()->attach($tags);

        return redirect()->back()->with('success', 'Post created successfully!');
    }

    // Home
    public function home()
    {
        $categories = DB::table('categories')->get();
        $statuses = DB::table('statuses')->get();
        $tags = DB::table('tags')->get();
        return view('pages.newPost', compact('categories', 'statuses', 'tags'));
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
        $posts = Blog::with('category', 'status', 'user', 'comments', 'like')->get();
        return view('pages.content', compact('posts', 'viewType'));
    }

    // Get posts by status (excluding soft-deleted)
    public function getPostByStatus($id)
    {
        $viewType = 'byStatus';
        $posts = Blog::with('category', 'status', 'user')->where('status_id', $id)->get();
        return view('pages.content', compact('posts', 'viewType'));
    }

    // Get posts by category (excluding soft-deleted)
    public function getPostByCategory($id)
    {
        $viewType = 'byCategory';
        $posts = Blog::with('category', 'status', 'user')->where('category_id', $id)->get();
        return view('pages.content', compact('posts', 'viewType'));
    }

    // Add comment on specific post
    public function addComment(CommentRequest $request, $id)
    {

        $comment = new Comment();
        $comment->blog_id = $id;
        $comment->comment = $request->input('comment');

        $comment->save();
        Log::info('Commented successfully');

        return back();
    }

    // Add a like sa blog post
    public function likeBlog($id)
    {
        $like_default = 0;

        $like = Like::firstOrCreate(
            ['blog_id' => $id],
            ['likes' => $like_default]
        );
        $like->increment('likes');

        Log::info('Liked successfully');
        # $like->save();
        return redirect()->back();
    }

    public function oneToOneRel()
    {
        $blogs = Blog::with('category', 'status', 'user', 'comment')->get();
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
