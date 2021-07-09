@extends('template')

@section('content')
<div>
    <h1>Manajemen Guru</h1>
    @forelse($teacher as $guru)
        <h1>{{ $guru->nip }} - {{ $guru->nama }} - {{ $guru->gender }}</h1>
        <a href="{{ route('teacher.edit', $guru) }}">Edit</a>
        <form action="{{ route('teacher.delete', $guru) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">delete</button>
        </form>
    @empty
        <h1>Kosong</h1>
    @endforelse
    <form action="{{ route('teacher.store') }}" method="post">
        @csrf
        <input type="text" name="nip" placeholder="nip">
        <input type="text" name="nama" placeholder="nama">
        <select name="gender" id="">
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
        </select>
        <button type="submit">submit</button>
    </form>
</div>
@endsection
