<div class="modal fade" id="edittaskModal{{ $task->id }}" tabindex="-1" aria-labelledby="edittaskModalLabel{{ $task->id }}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="edittaskModalLabel{{ $task->id }}">Edit Category</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
          </div>
          <form action="{{ route('tasks.update', $task->id) }}" method="post">
              @csrf
              @method('put')                                                                    
              <div class="modal-body">
                  <input type="text" class="form-control" name="title" value="{{ $task->title }}">
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
              </div>   
          </form>             
      </div>
  </div>
</div>