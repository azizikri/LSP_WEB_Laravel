@extends('template')

@section('content')
<div>
    <form action="{{ route('student.update', $student) }}" method="post">
        @csrf
        @method('patch')
        <select name="classroom_id" id="">
            @foreach($classroom as $kelas)
                <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
            @endforeach
        </select>
        <input type="text" name="nis" placeholder="nis" value="{{ $student->nis }}">
        <input type="text" name="nisn" placeholder="nisn" value="{{ $student->nisn }}">
        <input type="text" name="nama" placeholder="nama" value="{{ $student->nama }}">
        <select name="gender" id="">
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
        </select>
        <button type="submit">submit</button>
    </form>
</div>
@endsection
