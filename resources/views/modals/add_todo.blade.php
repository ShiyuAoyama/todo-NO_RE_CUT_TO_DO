<div class="modal fade" id="addTodoModal{{ $task->id }}" tabindex="-1" aria-labelledby="addTodoModalLabel{{ $task->id }}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="addTodoModalLabel{{ $task->id }}">Add ToDo</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
          </div>
          <form action="{{ route('tasks.todos.store') }}" method="post">
              @csrf
              <div class="modal-body">
                  <input type="text" class="form-control" name="content">
                  <input type="number" class="form-control" name="task_id" value="{{ $task->id }}" hidden>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
      </div>
  </div>
</div>