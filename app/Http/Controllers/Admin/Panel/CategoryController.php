<?php

namespace App\Http\Controllers\Admin\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')
            ->orderBy('name')
            ->paginate(10);

        return view('admin.panel.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.panel.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
        ]);

        Category::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()
            ->route('admin.panel.categories.index')
            ->with('success', 'Category berhasil dibuat.');
    }

    public function edit(Category $category)
    {
        return view('admin.panel.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
        ]);

        $category->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()
            ->route('admin.panel.categories.index')
            ->with('success', 'Category berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        if ($category->posts()->exists()) {
            return redirect()
                ->route('admin.panel.categories.index')
                ->with('error', 'Category tidak dapat dihapus karena masih memiliki post.');
        }

        $category->delete();

        return redirect()
            ->route('admin.panel.categories.index')
            ->with('success', 'Category berhasil dihapus.');
    }
}