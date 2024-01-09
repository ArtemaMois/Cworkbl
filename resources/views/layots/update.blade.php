@extends('templates.main')

@section('content')
    <div class="form__body">
        <form action="{{ route('note.update', ['note' => $note]) }}" method="post" class="form">
            @method('PATCH')
            @csrf
            <div class="form__header">
                <div class="form__input">
                    <label class="header__label">Заголовок</label>
                    <input type="text" name="title" value="{{ $note->title }}"
                        class="form__title @error('title')
                        invalid
                    @enderror">
                    <div class="invalid-message">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form__switcher">
                    @if ($note->is_important)
                        <label for="checkbox" class="checkbox">
                            <input type="hidden" name="is_important" value="0" />
                            <input class="form__checkbox" type="checkbox" value="1" name="is_important" id="checkbox"
                                checked />
                            <span class="form__inner">
                                Важная заметка
                            </span>
                        </label>
                    @else
                        <label for="checkbox" class="checkbox">
                            <input type="hidden" name="is_important" value="0" />
                            <input class="form__checkbox" type="checkbox" name="is_important" value="1"
                                id="checkbox" />
                            <span class="form__inner">
                                Важная заметка
                            </span>
                        </label>
                    @endif
                    <div class="invalid-message">
                        @error('is_important')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__text">
                <label class="text__label">Текст заметки</label>
                <textarea name="body" cols="50" rows="20" class="form__textarea @error('body') invalid @enderror">{{ $note->body }}</textarea>
                <div class="invalid-message">
                    @error('body')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__submit">
                <button type="submit" class="form__button">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
