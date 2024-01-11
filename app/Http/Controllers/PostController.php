<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::query()
            ->where('active', 1)
            ->whereDate('published_at', '<', now())
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if (!$post->active || $post->published_at > now()) {
            throw new NotFoundHttpException();
        }

        $next = Post::query()
            ->where('active', 1)
            ->whereDate('published_at', '<=', now())
            ->whereDate('published_at', '<', $post->published_at)
            ->orderBy('published_at')
            ->limit(1)
            ->first();

        $prev = Post::query()
            ->where('active', 1)
            ->whereDate('published_at', '<=', now())
            ->whereDate('published_at', '>', $post->published_at)
            ->orderBy('published_at')
            ->limit(1)
            ->first();

        return view('post.view', compact('post', 'next', 'prev'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function byCategory(Category $category): View
    {
        $posts = Post::query()
            ->join('category_post', 'posts.id','=', 'category_post.post_id')
            ->where('category_post.category_id',$category->id)
            ->where('active', true)
            ->whereDate('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('post.index', compact('posts', 'category'));
    }
}
