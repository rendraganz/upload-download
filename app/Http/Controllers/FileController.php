<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    // Form Upload
    public function uploadForm()
    {
        return view('files.upload');
    }

    // Proses Upload
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:16384', // max 16MB
        ]);

        // Simpan file ke D:/uploads
        $request->file('file')->store('', 'custom_local');

        return redirect()->route('files.upload.form')->with('success', 'File berhasil diupload!');
    }

    // Halaman daftar file
    public function downloadPage()
    {
        $files = Storage::disk('custom_local')->files();
        return view('files.download', compact('files'));
    }

    // Proses download
    public function download($filename)
    {
        if (!Storage::disk('custom_local')->exists($filename)) {
            abort(404, 'File tidak ditemukan.');
        }

        return Storage::disk('custom_local')->download($filename);
    }
}
