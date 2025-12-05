<form action="{{ route('statuses.store') }}" method="POST">
    @csrf
    @include('shared._errors')

    <textarea
        class="form-control"
        rows="3"
        placeholder="聊聊新鲜事儿..."
        name="content"
        required
    >{{ old('content') }}</textarea>

    <div class="text-end mt-2">
        <button type="submit" class="btn btn-primary">发布</button>
    </div>
</form>
