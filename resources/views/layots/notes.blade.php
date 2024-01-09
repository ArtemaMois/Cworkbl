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
        <form action="{{ route('note.search') }}" class="notes__search" method="POST">
            @csrf
            <input type="text" class="notes__search-input" name="title" placeholder="Введите заголовок...">
            <button type="submit" class="notes__search-btn"><img src="{{ asset('images/free-icon-search-4024513.png') }}" alt=""></button>
            <div class="invalid-message">
                @error('title')
                {{ $message }}
                @enderror
            </div>
        </form>
        @foreach ($notes as $note)
            @include('layots.note', ['note' => $note])
        @endforeach
    </div>
@endsection
