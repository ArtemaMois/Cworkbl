<div class="note">
    <div class="note__container">
        <a href="{{ route('note.edit', ['note' => $note]) }}">
            <div class="note__content">
                <div class="note__button-text">
                    <div class="note__text">
                        <div class="note__title">{{ $note->title }}</div>
                        @if (Str::length($note->body) > 50)
                            <div class="note__body">{{ Str::of($note->body)->limit(50, ' ...') }}</div>
                        @else
                            <div class="note__body">{{ $note->body }}</div>
                        @endif
                    </div>
                    <div class="note__delete">
                        <form action="{{ route('note.forcedelete', ['note' => $note->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="note__delete-btn">удалить</button>
                        </form>
                    </div>
                </div>
                <div class="note__date">{{ $note->updated_at }}</div>
            </div>
        </a>
    </div>
    <div class="note__restore">
        <form action="{{ route('note.restore', ['note' => $note]) }}" method="post">
            @method('PATCH')
            @csrf
            <button type="submit" class="note__restore-btn">восстановить</button>
        </form>
    </div>
</div>
