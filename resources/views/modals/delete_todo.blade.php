<div class="modal fade" id="deleteTodoModal{{ $todo->id }}" tabindex="-1" aria-labelledby="deleteTodoModalLabel{{ $todo->id }}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="deleteTodoModalLabel{{ $todo->id }}">Are you sure that you delete「{{ $todo->content }}」?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
          </div>
          <div class="modal-footer">
              <form action="{{ route('tasks.todos.destroy',$todo->id) }}" method="post">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger">Delete</button>
              </form>
          </div>
      </div>
  </div>
</div> 
