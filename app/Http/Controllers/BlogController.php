<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Tampilan list blog
     */
    public function index()
    {
        $blogs = Post::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        $recentPosts = Post::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        $categories = Category::withCount('posts')
            ->having('posts_count', '>', 0)
            ->get();

        // Gunakan view dengan folder blog/
        return view('blog.blog_list', compact('blogs', 'recentPosts', 'categories'));
    }

    /**
     * Tampilan detail blog
     */
    public function show($slug)
    {
        $blog = Post::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Increment views
        $blog->increment('views');

        // Related posts (same category)
        $relatedPosts = Post::where('category', $blog->category)
            ->where('id', '!=', $blog->id)
            ->where('status', 'published')
            ->limit(3)
            ->get();

        // Jika tidak ada related posts, ambil postingan terbaru
        if ($relatedPosts->isEmpty()) {
            $relatedPosts = Post::where('id', '!=', $blog->id)
                ->where('status', 'published')
                ->orderBy('published_at', 'desc')
                ->limit(3)
                ->get();
        }

        // Comments
        $comments = Comment::with('user')
            ->where('post_id', $blog->id)
            ->where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $categories = Category::withCount('posts')
            ->having('posts_count', '>', 0)
            ->get();

        return view('blog.blog_detail', compact('blog', 'relatedPosts', 'comments', 'categories'));
    }

    /**
     * Filter by category
     */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $blogs = Post::where('category_id', $category->id)
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        $recentPosts = Post::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        $categories = Category::withCount('posts')
            ->having('posts_count', '>', 0)
            ->get();

        return view('blog.blog_list', compact('blogs', 'recentPosts', 'categories', 'category'));
    }

    /**
     * Filter by tag
     */
    public function tag($tag)
    {
        $blogs = Post::where('status', 'published')
            ->whereJsonContains('tags', $tag)
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        $recentPosts = Post::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        $categories = Category::withCount('posts')
            ->having('posts_count', '>', 0)
            ->get();

        return view('blog.blog_list', compact('blogs', 'recentPosts', 'categories', 'tag'));
    }

    /**
     * Search blog
     */
    public function search(Request $request)
    {
        $q = $request->get('q');

        $blogs = Post::where('status', 'published')
            ->where(function($query) use ($q) {
                $query->where('title', 'LIKE', "%{$q}%")
                    ->orWhere('content', 'LIKE', "%{$q}%")
                    ->orWhere('excerpt', 'LIKE', "%{$q}%");
            })
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        $recentPosts = Post::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        $categories = Category::withCount('posts')
            ->having('posts_count', '>', 0)
            ->get();

        return view('blog.blog_list', compact('blogs', 'recentPosts', 'categories', 'q'));
    }

    /**
     * Post comment
     */
    public function comment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:1000'
        ]);

        Comment::create([
            'post_id' => $id,
            'user_id' => auth()->id(),
            'comment' => $request->comment,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Komentar berhasil dikirim dan menunggu moderasi.');
    }
}