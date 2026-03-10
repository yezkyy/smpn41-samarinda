<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Achievement;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'published')->latest()->take(3)->get();
        $achievements = Achievement::latest()->take(4)->get();
        $teacherCount = Teacher::count();
        
        return view('pages.home', compact('posts', 'achievements', 'teacherCount'));
    }
}
