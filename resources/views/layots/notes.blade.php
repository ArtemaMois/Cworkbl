@extends('templates.main')

@section('content')
    <div class="content__notes">
        <div class="notes__header">
            <h1 class="notes__title">Список Заметок</h1>
            <div class="notes__importance">
                <div class="importance__red">
                    <div class="importance__text">Важные</div>
                    <div class="importance__redcircle"></div>
                </div>
                <div class="importance__blue">
                    <div class="importance__text">Не важные</div>
                    <div class="importance__bluecircle"></div>
                </div>
            </div>
        </div>
        @foreach ($notes as $note)
            @include('layots.note', ['note' => $note])
        @endforeach
    </div>
@endsection
