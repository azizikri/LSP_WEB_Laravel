@extends('template')

@section('content')
<div>
    <h1>Data Siswa</h1>
    @forelse($siswa as $student)
        <h1>{{ $student->nis }} - {{ $student->nisn }} -{{ $student->nama }} - {{ $student->classroom->kelas }}</h1>
    @empty
        <h1>Kosong</h1>
    @endforelse
</div>
@endsection
