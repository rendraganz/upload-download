@extends('layouts.app')
@section('title', 'Upload & Download File')

@section('content')

    <div class="bg-white p-6 shadow rounded-lg mb-6">
        <h2 class="text-2xl font-semibold mb-4">Upload File</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-3">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-3">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <input type="file" name="file" class="block w-full border border-gray-300 rounded p-2" required>

            <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                Upload
            </button>
        </form>
    </div>


    <div class="bg-white p-6 shadow rounded-lg">
        <h2 class="text-2xl font-semibold mb-4">Daftar File</h2>

        @if($files->count() == 0)
            <p class="text-gray-600">Belum ada file yang diupload.</p>
        @else
            <ul class="space-y-2">
                @foreach ($files as $file)
                    <li class="p-3 border rounded flex justify-between items-center">
                        <span class="font-medium">{{ $file->filename }}</span>

                        <a href="{{ route('file.download', $file->id) }}"
                            class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white rounded">
                            Download
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

@endsection