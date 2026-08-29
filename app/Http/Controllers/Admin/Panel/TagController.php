<?php

namespace App\Http\Controllers\Admin\Panel;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $posts = Post::whereNotNull('tags')->get();

        $tags = [];

        foreach ($posts as $post) {
            $postTags = $post->tags;

            if (is_string($postTags)) {
                $postTags = json_decode($postTags, true) ?? [];
            }

            if (is_array($postTags)) {
                foreach ($postTags as $tag) {
                    $tag = trim($tag);

                    if ($tag !== '') {
                        $tags[] = $tag;
                    }
                }
            }
        }

        $tags = collect($tags)
            ->countBy()
            ->sortDesc();

        return view('admin.panel.tags.index', compact('tags'));
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'tag' => 'required|string',
        ]);

        $tag = trim($request->tag);

        $posts = Post::whereNotNull('tags')->get();

        foreach ($posts as $post) {

            $postTags = $post->tags;

            if (is_string($postTags)) {
                $postTags = json_decode($postTags, true) ?? [];
            }

            if (!is_array($postTags)) {
                continue;
            }

            $postTags = collect($postTags)
                ->reject(function ($item) use ($tag) {
                    return strcasecmp(trim($item), $tag) === 0;
                })
                ->values()
                ->toArray();

            $post->update([
                'tags' => $postTags
            ]);
        }

        return redirect()
            ->route('admin.tags.index')
            ->with('success', 'Tag berhasil dihapus.');
    }
}