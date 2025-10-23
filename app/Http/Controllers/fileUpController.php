<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\FileUp;

class  FileUpController extends Controller
{
    public function form_upload()
    {
        return view('file.upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:16384', // max 16MB
        ]);

        if ($request->file('file')->isValid()) {
            $path = $request->file('file')->store('uploads', 'public');

            FileUp::create([
                'filename' => $request->file('file')->getClientOriginalName(),
                'path' => $path,
            ]);

            return redirect()->route('file.upload')->with('success', 'File berhasil diupload!');
        }

        return back()->withErrors(['file' => 'Gagal mengupload file.']);
    }

    public function show($id)
    {
        $file = FileUp::findOrFail($id);
        return view('file.show', compact('file'));
    }

    public function download($id)
    {
        $file = FileUp::findOrFail($id);

        if (Storage::disk('public')->exists($file->path)) {
            return Storage::disk('public')->download($file->path, $file->filename);
        }

        abort(404, 'File tidak ditemukan');
    }
}
