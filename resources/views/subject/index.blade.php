@extends('template')

@section('content')
<div>
    <h1>Manajemen Mapel</h1>
    @forelse($subject as $mapel)
        <h1>{{ $mapel->kode }} - {{ $mapel->mapel }}</h1>
        <a href="{{ route('subject.edit', $mapel) }}">Edit</a>
        <form action="{{ route('subject.delete', $mapel) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">delete</button>
        </form>
    @empty
        <h1>Kosong</h1>
    @endforelse
    <form action="{{ route('subject.store') }}" method="post">
        @csrf
        <input type="text" name="kode" placeholder="kode">
        <input type="text" name="mapel" placeholder="mapel">
        <button type="submit">submit</button>
    </form>
</div>
@endsection
