@if ($feed_items->count() > 0)
    <ul class="list-unstyled">
        @foreach ($feed_items as $status)
            @include('statuses._status', ['status' => $status, 'user' => $status->user])
        @endforeach
    </ul>

    <div class="mt-4">
        {{ $feed_items->links() }}
    </div>
@else
    <p class="text-muted">暂无微博动态。</p>
@endif
