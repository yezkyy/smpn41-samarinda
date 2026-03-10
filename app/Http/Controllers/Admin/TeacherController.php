<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::latest()->paginate(10);
        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'birth_place_date' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'nip' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'subject' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'education_history' => 'nullable|string',
            'employment_history' => 'nullable|string',
            'motivation_message' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'photo.image' => 'File harus berupa gambar.',
            'photo.max' => 'Ukuran foto maksimal 3MB.',
        ]);

        try {
            DB::beginTransaction();

            $data = $request->all();

            if ($request->hasFile('photo')) {
                $data['photo'] = $request->file('photo')->store('teachers', 'public');
            }

            Teacher::create($data);

            DB::commit();
            return redirect()->route('admin.teachers.index')->with('success', 'Data Guru/Staf berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'birth_place_date' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'nip' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'subject' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'education_history' => 'nullable|string',
            'employment_history' => 'nullable|string',
            'motivation_message' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'photo.image' => 'File harus berupa gambar.',
            'photo.max' => 'Ukuran foto maksimal 3MB.',
        ]);

        try {
            DB::beginTransaction();

            $data = $request->all();

            if ($request->hasFile('photo')) {
                if ($teacher->photo) {
                    Storage::disk('public')->delete($teacher->photo);
                }
                $data['photo'] = $request->file('photo')->store('teachers', 'public');
            }

            $teacher->update($data);

            DB::commit();
            return redirect()->route('admin.teachers.index')->with('success', 'Data Guru/Staf berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy(Teacher $teacher)
    {
        try {
            if ($teacher->photo) {
                Storage::disk('public')->delete($teacher->photo);
            }
            $teacher->delete();

            return redirect()->route('admin.teachers.index')->with('success', 'Data Guru/Staf berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus data.');
        }
    }
}
