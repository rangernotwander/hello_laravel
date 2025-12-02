{{-- resources/views/users/_user.blade.php --}}
<div class="list-group-item d-flex align-items-center">
  <img class="me-3 rounded" src="{{ $user->gravatar() }}" alt="{{ $user->name }}" width="32">
  <a href="{{ route('users.show', $user) }}" class="text-decoration-none">
    {{ $user->name }}
  </a>

  @can('destroy', $user)
    <form
      action="{{ route('users.destroy', $user) }}"
      method="POST"
      class="ms-auto"
      onsubmit="return confirm('确定要删除此用户吗？')"
    >
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-sm btn-danger">删除</button>
    </form>
  @endcan
</div>
