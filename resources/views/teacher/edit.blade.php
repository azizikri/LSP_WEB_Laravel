@extends('template')

@section('content')
<div>
    <form action="{{ route('teacher.update', $teacher) }}" method="post">
        @csrf
        @method('patch')
        <input type="text" name="nip" placeholder="nip" value="{{ $teacher->nip }}">
        <input type="text" name="nama" placeholder="nama" value="{{ $teacher->nama }}">
        <select name="gender" id="">
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
        </select>
        <button type="submit">submit</button>
    </form>
</div>
@endsection
