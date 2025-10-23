<file src="{{ asset('storage/' . $file->path) }}"></file>
<a href="{{ route('file.download', $file->id) }}">Download File</a>
