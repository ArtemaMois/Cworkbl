@extends('templates.main')

@section('content')
    <div class="form-create__body">
        <form action="{{ route('note.store') }}" method="post" class="form-create">
            @csrf
            <div class="form-create__header">
                <div class="form-create__header-text">Новая заметка</div>
                <div class="form-create__switcher">
                    <label for="checkbox" class="checkbox">
                        <input type="hidden" name="is_important" value="0" />
                        <input class="form-create__checkbox @error('is_important') invalid @enderror" type="checkbox"
                            name="is_important" value="1" id="checkbox" />
                        <span class="form-create__inner">
                            Важная заметка
                        </span>
                    </label>
                    <div class="invalid-message">
                        @error('is_important')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-create__title">
                <div class="form-create__title-label">Заголовок</div>
                <input type="text" name="title" placeholder="Заголовок"
                    class="form-create__title-input @error('title') invalid @enderror" />
                <div class="invalid-message">
                    @error('title')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-create__body">
                <label class="form-create__body-label">Текст заметки</label>
                <textarea name="body" cols="50" rows="20" class="form-create__body-textarea @error('body') invalid @enderror"
                    placeholder="Текст заметки..."></textarea>
                <div class="invalid-message">
                    @error('body')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-create__submit">
                <button type="submit" class="form-create__button">Создать</button>
            </div>
        </form>
    </div>
@endsection
