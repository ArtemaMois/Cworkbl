@extends('templates.main')

@section('content')
    <div class="content__notes">
        <div class="notes__header">
            <h1 class="notes__title">Важные заметки</h1>
        </div>
        @foreach ($notes as $note)
            @include('layots.note', ['note' => $note])
        @endforeach
    </div>
@endsection
