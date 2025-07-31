<div class="wsus__user_list_item messenger-list-item" data-id="{{ $record->id }}">
    <div class="img">
        <img src="{{ asset($record->avatar) }}" alt="User" class="img-fluid">
    </div>
    <div class="text">
        <h5>{{ $record->name }}</h5>
        <p>{{ $record->username }}</p>
    </div>
</div>
