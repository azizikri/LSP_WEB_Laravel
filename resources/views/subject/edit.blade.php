@extends('template')

@section('content')
<div>
    <form action="{{ route('subject.update', $subject) }}" method="post">
        @csrf
        @method('patch')
        <input type="text" name="kode" placeholder="kode" value="{{ $subject->kode }}">
        <input type="text" name="mapel" placeholder="mapel" value="{{ $subject->mapel }}">
        <button type="submit">submit</button>
    </form>
</div>
@endsection
