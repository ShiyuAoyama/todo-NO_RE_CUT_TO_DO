<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="addTaskModalLabel">目標の追加</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
          </div>
          <form action="{{ route('tasks.store') }}" method="post">
              @csrf
              <div class="modal-body">
                  <input type="text" class="form-control" name="title">
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">登録</button>
              </div>
          </form>
      </div>
  </div>
</div>
