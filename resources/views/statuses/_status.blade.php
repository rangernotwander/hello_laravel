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
                {{-- 删除按钮 --}}
        @can('destroy', $status)
            <form
                action="{{ route('statuses.destroy', $status) }}"
                method="POST"
                onsubmit="return confirm('您确定要删除本条微博吗？')"
                class="d-inline"
            >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger mt-2">
                    删除
                </button>
            </form>
        @endcan
    </div>
</li>
