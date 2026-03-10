<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('photos')->latest()->paginate(12);
        return view('pages.gallery.index', compact('galleries'));
    }

    public function show(Gallery $gallery)
    {
        $gallery->load('photos');
        return view('pages.gallery.show', compact('gallery'));
    }
}
