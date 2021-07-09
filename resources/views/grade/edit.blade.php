@extends('template')

@section('content')
<div>
    <form action="{{ route('grade.update', $grade) }}" method="post">
        @csrf
        @method('patch')
        <select name="student_id" id="">
            @foreach($student as $murid)
                <option value="{{ $murid->id }}">{{ $murid->nama }}</option>
            @endforeach
        </select>
        <select name="teaching_id" id="">
            @foreach($teaching as $mengajar)
                <option value="{{ $mengajar->id }}">{{ $mengajar->teacher->nama }} - {{ $mengajar->subject->mapel }}</option>
            @endforeach
        </select>
        <input type="text" name="uts" placeholder="uts" value="{{ $grade->uts }}">
        <input type="text" name="uas" placeholder="uas" value="{{ $grade->uas }}">
        <input type="text" name="uh" placeholder="uh" value="{{ $grade->uh }}">
        <input type="text" name="tugas" placeholder="tugas" value="{{ $grade->tugas }}">
        <button type="submit">submit</button>
    </form>
</div>
@endsection
