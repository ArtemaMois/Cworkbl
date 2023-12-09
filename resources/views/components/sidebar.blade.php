<div class="sidebar">
    <div class="sidebar__body">
        <div class="sidebar__notes">
            <div class="sidebar__text">Заметки</div>
            <div class="sidebar__option">
                <a href="{{ route('note.index') }}"><div class="sidebar__all">Все заметки</div></a>
                <a href="{{ route('note.create') }}"><div class="sidebar__add">Добавить</div></a>
                <a href="{{ route('note.imortant') }}"><div class="sidebar__important">Важные</div></a>
                <a href="{{ route('note.deleted') }}"><div class="sidebar__deleted">Удаленные</div></a>
            </div>
        </div>
    </div>
</div>
