@extends('template')

@section('content')
<div>
    <h1>Manajemen Mengajar</h1>
    @forelse($teaching as $mengajar)
        <h1>{{ $mengajar->teacher->nama }} - {{ $mengajar->classroom->kelas }} - {{ $mengajar->subject->mapel }}</h1>
        <a href="{{ route('teaching.edit', $mengajar) }}">Edit</a>
        <form action="{{ route('teaching.delete', $mengajar) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">delete</button>
        </form>
    @empty
        <h1>Kosong</h1>
    @endforelse
    <form action="{{ route('teaching.store') }}" method="post">
        @csrf
        <select name="classroom_id" id="">
            @foreach($classroom as $kelas)
                <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
            @endforeach
        </select>
        <select name="subject_id" id="">
            @foreach($subject as $mapel)
                <option value="{{ $mapel->id }}">{{ $mapel->mapel }}</option>
            @endforeach
        </select>
        <select name="teacher_id" id="">
            @foreach($teacher as $guru)
                <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
            @endforeach
        </select>
        <button type="submit">submit</button>
    </form>
</div>
@endsection
