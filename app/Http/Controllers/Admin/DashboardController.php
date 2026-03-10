<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Teacher;
use App\Models\Gallery;
use App\Models\Extracurricular;
use App\Models\Achievement;
use App\Models\Document;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $stats = [
            'posts' => Post::count(),
            'teachers' => Teacher::count(),
            'galleries' => Gallery::count(),
            'extracurriculars' => Extracurricular::count(),
            'achievements' => Achievement::count(),
            'documents' => Document::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
