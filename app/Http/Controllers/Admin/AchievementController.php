<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::latest()->paginate(10);
        return view('admin.achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('admin.achievements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ], [
            'title.required' => 'Judul prestasi wajib diisi.',
            'year.required' => 'Tahun prestasi wajib diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.max' => 'Ukuran gambar maksimal 3MB.',
        ]);

        try {
            DB::beginTransaction();

            $data = $request->only(['title', 'year', 'description']);
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('achievements', 'public');
            }

            Achievement::create($data);

            DB::commit();
            return redirect()->route('admin.achievements.index')->with('success', 'Prestasi "' . $request->title . '" berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit(Achievement $achievement)
    {
        return view('admin.achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ], [
            'title.required' => 'Judul prestasi wajib diisi.',
            'year.required' => 'Tahun prestasi wajib diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.max' => 'Ukuran gambar maksimal 3MB.',
        ]);

        try {
            DB::beginTransaction();

            $data = $request->only(['title', 'year', 'description']);
            if ($request->hasFile('image')) {
                if ($achievement->image) {
                    Storage::disk('public')->delete($achievement->image);
                }
                $data['image'] = $request->file('image')->store('achievements', 'public');
            }

            $achievement->update($data);

            DB::commit();
            return redirect()->route('admin.achievements.index')->with('success', 'Prestasi berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(Achievement $achievement)
    {
        try {
            if ($achievement->image) {
                Storage::disk('public')->delete($achievement->image);
            }
            $achievement->delete();
            return redirect()->route('admin.achievements.index')->with('success', 'Prestasi berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus data.');
        }
    }
}
