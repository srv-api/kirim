<?php

namespace App\Http\Controllers\Admin\Panel;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * List semua post
     */
    public function index(Request $request)
    {
        $query = Post::with('category')
            ->orderBy('created_at', 'desc');

        // Search
        if ($request->filled('q')) {
            $q = $request->q;

            $query->where(function ($query) use ($q) {
                $query->where('title', 'like', "%{$q}%")
                    ->orWhere('excerpt', 'like', "%{$q}%");
            });
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $posts = $query->paginate(10)->withQueryString();

        return view('admin.panel.posts.index', compact('posts'));
    }

    /**
     * Form tambah post
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.panel.posts.create', compact('categories'));
    }

    /**
     * Simpan post
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|string',
            'status' => 'required|in:draft,published,archived',
            'featured_image' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
        ]);

        $tags = [];

        if (!empty($request->tags)) {
            $tags = collect(explode(',', $request->tags))
                ->map(fn ($tag) => trim($tag))
                ->filter()
                ->values()
                ->toArray();
        }

        $status = $request->status;

        $publishedAt = null;

        if ($status === 'published') {
            $publishedAt = $request->published_at ?? now();
        }

        Post::create([
            'title' => $validated['title'],
            'slug' => $this->generateUniqueSlug($validated['title']),
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'],
            'category_id' => $validated['category_id'] ?? null,
            'tags' => $tags,
            'status' => $status,
            'featured_image' => $validated['featured_image'] ?? null,
            'published_at' => $publishedAt,
            'views' => 0,
        ]);

        return redirect()
            ->route('admin.panel.posts.index')
            ->with('success', 'Post berhasil dibuat.');
    }

    /**
     * Form edit
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.panel.posts.edit', compact(
            'post',
            'categories'
        ));
    }

    /**
     * Update post
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|string',
            'status' => 'required|in:draft,published,archived',
            'featured_image' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
        ]);

        $tags = [];

        if (!empty($request->tags)) {
            $tags = collect(explode(',', $request->tags))
                ->map(fn ($tag) => trim($tag))
                ->filter()
                ->values()
                ->toArray();
        }

        $publishedAt = $post->published_at;

        if ($request->status === 'published' && !$publishedAt) {
            $publishedAt = $request->published_at ?? now();
        }

        if ($request->status !== 'published') {
            $publishedAt = null;
        }

        $post->update([
            'title' => $validated['title'],
            'slug' => $this->generateUniqueSlug(
                $validated['title'],
                $post->id
            ),
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'],
            'category_id' => $validated['category_id'] ?? null,
            'tags' => $tags,
            'status' => $validated['status'],
            'featured_image' => $validated['featured_image'] ?? null,
            'published_at' => $publishedAt,
        ]);

        return redirect()
            ->route('admin.panel.posts.index')
            ->with('success', 'Post berhasil diperbarui.');
    }

    /**
     * Hapus post
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('admin.panel.posts.index')
            ->with('success', 'Post berhasil dihapus.');
    }

    /**
     * Generate slug unik
     */
    private function generateUniqueSlug($title, $ignoreId = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;

        $counter = 1;

        while (
            Post::where('slug', $slug)
                ->when($ignoreId, function ($query) use ($ignoreId) {
                    $query->where('id', '!=', $ignoreId);
                })
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }
}