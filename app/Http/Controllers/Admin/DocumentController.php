<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::latest()->paginate(10);
        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        return view('admin.documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,zip|max:10240', // Max 10MB
            'description' => 'nullable|string',
        ], [
            'title.required' => 'Judul dokumen wajib diisi.',
            'file.required' => 'File dokumen wajib diunggah.',
            'file.mimes' => 'Format file tidak didukung (Gunakan PDF, Word, Excel, atau ZIP).',
            'file.max' => 'Ukuran file maksimal 10MB.',
        ]);

        try {
            DB::beginTransaction();

            $data = $request->only(['title', 'description']);
            if ($request->hasFile('file')) {
                $data['file'] = $request->file('file')->store('documents', 'public');
            }

            Document::create($data);

            DB::commit();
            return redirect()->route('admin.documents.index')->with('success', 'Dokumen "' . $request->title . '" berhasil diunggah.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit(Document $document)
    {
        return view('admin.documents.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,zip|max:10240',
            'description' => 'nullable|string',
        ], [
            'title.required' => 'Judul dokumen wajib diisi.',
            'file.mimes' => 'Format file tidak didukung (Gunakan PDF, Word, Excel, atau ZIP).',
            'file.max' => 'Ukuran file maksimal 10MB.',
        ]);

        try {
            DB::beginTransaction();

            $data = $request->only(['title', 'description']);
            if ($request->hasFile('file')) {
                if ($document->file) {
                    Storage::disk('public')->delete($document->file);
                }
                $data['file'] = $request->file('file')->store('documents', 'public');
            }

            $document->update($data);

            DB::commit();
            return redirect()->route('admin.documents.index')->with('success', 'Dokumen berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(Document $document)
    {
        try {
            if ($document->file) {
                Storage::disk('public')->delete($document->file);
            }
            $document->delete();
            return redirect()->route('admin.documents.index')->with('success', 'Dokumen berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus dokumen.');
        }
    }
}
