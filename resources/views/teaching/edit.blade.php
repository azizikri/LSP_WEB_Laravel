@extends('template')

@section('content')
<div>
    <form action="{{ route('teaching.update', $teaching) }}" method="post">
        @csrf
        @method('patch')
        <select name="classroom_id" id="">
            @foreach($classroom as $kelas)
                <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
            @endforeach
        </select>
        <select name="subject_id" id="">
            @foreach($subject as $mapel)
                <option value="{{ $mapel->id }}">{{ $mapel->mapel }}</option>
            @endforeach
        </select>
        <select name="teacher_id" id="">
            @foreach($teacher as $guru)
                <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
            @endforeach
        </select>
        <button type="submit">submit</button>
    </form>
</div>
@endsection
