@extends('template')

@section('content')
<div>
    <form action="{{ route('classroom.update', $classroom) }}" method="post">
        @csrf
        @method('patch')
        <select name="major_id" id="">
            @foreach($major as $jurusan)
                <option value="{{ $jurusan->id }}">{{ $jurusan->jurusan }}</option>
            @endforeach
        </select>
        <input type="text" name="kelas" placeholder="jurusan" value="{{ $classroom->kelas }}">
        <button type="submit">submit</button>
    </form>
</div>
@endsection
