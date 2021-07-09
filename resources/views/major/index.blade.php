@extends('template')

@section('content')
<div>
    <h1>Manajemen Jurusan</h1>
    @forelse($major as $jurusan)
        <h1>{{ $jurusan->kode }} - {{ $jurusan->jurusan }}</h1>
        <a href="{{ route('major.edit', $jurusan) }}">Edit</a>
        <form action="{{ route('major.delete', $jurusan) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">delete</button>
        </form>
    @empty
        <h1>Kosong</h1>
    @endforelse
    <form action="{{ route('major.store') }}" method="post">
        @csrf
        <input type="text" name="kode" placeholder="kode">
        <input type="text" name="jurusan" placeholder="jurusan">
        <button type="submit">submit</button>
    </form>
</div>
@endsection
