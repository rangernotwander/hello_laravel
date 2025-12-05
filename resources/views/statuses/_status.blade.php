<li class="d-flex mt-3 p-3 border rounded">
    <a href="{{ route('users.show', $user->id) }}" class="flex-shrink-0 me-3">
        <img src="{{ $user->gravatar(50) }}"
             alt="{{ $user->name }}"
             class="rounded-circle"
             width="50"
             height="50">
    </a>
    <div class="flex-grow-1">
        <div class="d-flex justify-content-between">
            <strong>{{ $user->name }}</strong>
            <small class="text-muted">{{ $status->created_at->diffForHumans() }}</small>
        </div>
        <p class="mt-2 mb-0">{{ $status->content }}</p>
    </div>
</li>
