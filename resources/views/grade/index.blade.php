@extends('template')

@section('content')
<div>
    <h1>Manajemen Nilai</h1>
    @forelse($grade as $nilai)
        <table>
            <tr>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Mapel</th>
                <th>Guru</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai UH</th>
                <th>Nilai Tugas</th>
                <th>Nilai Akhir</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tr>
                <td>{{ $nilai->student->nama }}</td>
                <td>{{ $nilai->student->classroom->kelas }}</td>
                <td>{{ $nilai->teaching->subject->mapel }}</td>
                <td>{{ $nilai->teaching->teacher->nama }}</td>
                <td>{{ $nilai->uts }}</td>
                <td>{{ $nilai->uas }}</td>
                <td>{{ $nilai->tugas }}</td>
                <td>{{ $nilai->uh }}</td>
                <td>{{ $nilai->nilai_akhir }}</td>
                <td><a href="{{ route('grade.edit', $nilai) }}">Edit</a></td>
                <td>
                    <form action="{{ route('grade.delete', $nilai) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">delete</button>
                    </form>
                </td>
            </tr>
        </table>
    @empty
        <h1>Kosong</h1>
    @endforelse
    <form action="{{ route('grade.store') }}" method="post">
        @csrf
        <select name="teaching_id" id="">
            @foreach($teaching as $mengajar)
                <option value="{{ $mengajar->id }}">{{ $mengajar->teacher->nama }} - {{ $mengajar->subject->mapel }}</option>
            @endforeach
        </select>
        <br>
        <select name="student_id" id="">
            @foreach($student as $murid)
                <option value="{{ $murid->id }}">{{ $murid->nama }}</option>
            @endforeach
        </select>
        <br>
        <input type="text" name="uts" id="" placeholder="UTS">
        <br>
        <input type="text" name="uas" id="" placeholder="UAS">
        <br>
        <input type="text" name="uh" id="" placeholder="UH">
        <br>
        <input type="text" name="tugas" id="" placeholder="Tugas">
        <br>
        <button type="submit">submit</button>
    </form>
</div>
@endsection
