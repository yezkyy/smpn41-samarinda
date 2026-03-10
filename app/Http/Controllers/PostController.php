<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'published')->latest()->paginate(9);
        return view('pages.posts.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('status', 'published')->firstOrFail();
        
        // Ambil berita terbaru lainnya untuk sidebar
        $latest_posts = Post::where('id', '!=', $post->id)
                            ->where('status', 'published')
                            ->latest()
                            ->take(5)
                            ->get();

        return view('pages.posts.show', compact('post', 'latest_posts'));
    }
}
