@extends('template')

@section('content')
<div>
    <h1>Manajemen Kelas</h1>
    @forelse($classroom as $kelas)
        <h1>{{ $kelas->major->kode }} - {{ $kelas->kelas }}</h1>
        <a href="{{ route('classroom.edit', $kelas) }}">Edit</a>
        <form action="{{ route('classroom.delete', $kelas) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">delete</button>
        </form>
    @empty
        <h1>Kosong</h1>
    @endforelse
    <form action="{{ route('classroom.store') }}" method="post">
        @csrf
        <select name="major_id" id="">
            @foreach($major as $jurusan)
                <option value="{{ $jurusan->id }}">{{ $jurusan->jurusan }}</option>
            @endforeach
        </select>
        <input type="text" name="kelas" placeholder="kelas">
        <button type="submit">submit</button>
    </form>
</div>
@endsection
