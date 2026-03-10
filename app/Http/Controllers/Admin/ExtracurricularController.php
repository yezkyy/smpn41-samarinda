<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ExtracurricularController extends Controller
{
    public function index()
    {
        $extracurriculars = Extracurricular::latest()->paginate(10);
        return view('admin.extracurriculars.index', compact('extracurriculars'));
    }

    public function create()
    {
        return view('admin.extracurriculars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ], [
            'name.required' => 'Nama ekstrakurikuler wajib diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.max' => 'Ukuran gambar maksimal 3MB.',
        ]);

        try {
            DB::beginTransaction();

            $data = $request->only(['name', 'description']);
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('extracurriculars', 'public');
            }

            Extracurricular::create($data);

            DB::commit();
            return redirect()->route('admin.extracurriculars.index')->with('success', 'Ekstrakurikuler "' . $request->name . '" berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit(Extracurricular $extracurricular)
    {
        return view('admin.extracurriculars.edit', compact('extracurricular'));
    }

    public function update(Request $request, Extracurricular $extracurricular)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ], [
            'name.required' => 'Nama ekstrakurikuler wajib diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.max' => 'Ukuran gambar maksimal 3MB.',
        ]);

        try {
            DB::beginTransaction();

            $data = $request->only(['name', 'description']);
            if ($request->hasFile('image')) {
                if ($extracurricular->image) {
                    Storage::disk('public')->delete($extracurricular->image);
                }
                $data['image'] = $request->file('image')->store('extracurriculars', 'public');
            }

            $extracurricular->update($data);

            DB::commit();
            return redirect()->route('admin.extracurriculars.index')->with('success', 'Ekstrakurikuler berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(Extracurricular $extracurricular)
    {
        try {
            if ($extracurricular->image) {
                Storage::disk('public')->delete($extracurricular->image);
            }
            $extracurricular->delete();
            return redirect()->route('admin.extracurriculars.index')->with('success', 'Ekstrakurikuler berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus data.');
        }
    }
}
