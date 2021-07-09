@extends('template')

@section('content')
<div>
    <h1>Manajemen Siswa</h1>
    @forelse($student as $murid)
        <h1>{{ $murid->nis }} - {{ $murid->nisn }} -{{ $murid->nama }} - {{ $murid->classroom->kelas }}</h1>
        <a href="{{ route('student.edit', $murid) }}">Edit</a>
        <form action="{{ route('student.delete', $murid) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">delete</button>
        </form>
    @empty
        <h1>Kosong</h1>
    @endforelse
    <form action="{{ route('student.store') }}" method="post">
        @csrf
        <select name="classroom_id" id="">
            @foreach($classroom as $kelas)
                <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
            @endforeach
        </select>
        <input type="text" name="nis" placeholder="nis">
        <input type="text" name="nisn" placeholder="nisn">
        <input type="text" name="nama" placeholder="nama">
        <select name="gender" id="">
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
        </select>
        <button type="submit">submit</button>
    </form>
</div>
@endsection
