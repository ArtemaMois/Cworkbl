@extends('templates.main')

@section('content')
    <div class="form__body">
        <form action="{{ route('note.store') }}" method="post" class="form">
            @csrf
            <div class="form__header">
                <label class="header__label">Заголовок</label>
                <input type="text" name="title" class="form__title">
            </div>
            <div class="form__text">
                <label class="text__label">Текст заметки</label>
                <textarea name="body" cols="50" rows="20" class="form__textarea" required></textarea>
            </div>
            <div class="form__submit">
                <button type="submit" class="form__button">Создать</button>
            </div>
        </form>
    </div>
@endsection
