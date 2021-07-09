@extends('template')

@section('content')
<div>
    <h1>Data Nilai</h1>
    @forelse($nilai as $grade)
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
            </tr>
            <tr>
                <td>{{ $grade->student->nama }}</td>
                <td>{{ $grade->student->classroom->kelas }}</td>
                <td>{{ $grade->teaching->subject->mapel }}</td>
                <td>{{ $grade->teaching->teacher->nama }}</td>
                <td>{{ $grade->uts }}</td>
                <td>{{ $grade->uas }}</td>
                <td>{{ $grade->tugas }}</td>
                <td>{{ $grade->uh }}</td>
                <td>{{ $grade->nilai_akhir }}</td>
            </tr>
        </table>
    @empty
        <h1>Kosong</h1>
    @endforelse
</div>
@endsection
