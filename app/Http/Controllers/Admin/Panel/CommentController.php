<?php

namespace App\Http\Controllers\Admin\Panel;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Daftar semua komentar
     */
    public function index(Request $request)
    {
        $query = Comment::with(['user', 'post'])
            ->orderBy('created_at', 'desc');

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->filled('q')) {
            $q = $request->q;

            $query->where(function ($query) use ($q) {
                $query->where('comment', 'like', "%{$q}%")
                    ->orWhereHas('user', function ($query) use ($q) {
                        $query->where('name', 'like', "%{$q}%");
                    });
            });
        }

        $comments = $query
            ->paginate(10)
            ->withQueryString();

        return view('admin.panel.comments.index', compact('comments'));
    }

    /**
     * Detail komentar
     */
    public function show(Comment $comment)
    {
        $comment->load(['user', 'post']);

        return view('admin.panel.comments.show', compact('comment'));
    }

    /**
     * Form edit / moderasi
     */
    public function edit(Comment $comment)
    {
        $comment->load(['user', 'post']);

        return view('admin.panel.comments.edit', compact('comment'));
    }

    /**
     * Update status komentar
     */
    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $comment->update([
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('admin.panel.comments.index')
            ->with('success', 'Status komentar berhasil diperbarui.');
    }

    /**
     * Hapus komentar
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()
            ->route('admin.panel.comments.index')
            ->with('success', 'Komentar berhasil dihapus.');
    }
}