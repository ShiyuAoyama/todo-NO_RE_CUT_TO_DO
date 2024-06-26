<div class="modal fade" id="editTodoModal{{ $todo->id }}" tabindex="-1" aria-labelledby="editTodoModalLabel{{ $todo->id }}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="editTodoModalLabel{{ $todo->id }}">Edit Todo</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
          </div>
          <form action="{{ route('tasks.todos.update', $todo->id) }}" method="post">
              @csrf
              @method('put')  
              <div class="modal-body">
                  <input type="text" class="form-control" name="content" value="{{ $todo->content }}">                                         
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
              </div>
          </form>
      </div>
  </div>
</div>