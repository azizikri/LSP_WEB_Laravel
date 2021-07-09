@extends('template')

@section('content')
<div>
    <form action="{{ route('major.update', $major) }}" method="post">
        @csrf
        @method('patch')
        <input type="text" name="kode" placeholder="kode" value="{{ $major->kode }}">
        <input type="text" name="jurusan" placeholder="jurusan" value="{{ $major->jurusan }}">
        <button type="submit">submit</button>
    </form>
</div>
@endsection
