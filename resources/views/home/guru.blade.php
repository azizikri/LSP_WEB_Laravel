@extends('template')

@section('content')
<div>
    <h1>Data Guru</h1>
    @forelse($guru as $teacher)
        <h1>{{ $teacher->nip }} - {{ $teacher->nama }} - {{ $teacher->gender }}</h1>
    @empty
        <h1>Kosong</h1>
    @endforelse
</div>
@endsection
