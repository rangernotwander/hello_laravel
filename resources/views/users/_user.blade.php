<div class="list-group-item d-flex align-items-center">
  <img class="me-3 rounded"
       src="{{ $user->gravatar() }}"
       alt="{{ $user->name }}"
       width="32" height="32">
  <a href="{{ route('users.show', $user) }}" class="text-decoration-none">
    {{ $user->name }}
  </a>
</div>
