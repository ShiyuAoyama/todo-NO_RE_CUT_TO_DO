@extends('layouts.app')

 @section('content')
     <div class="container h-100">
         @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
         @endif

         <!-- 目標の追加用モーダル -->
         @include('modals.add_task')

         <div class="d-flex mb-3">
             <a href="#" class="link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#addTaskModal">
                 <div class="d-flex align-items-center">
                     <span class="fs-5 fw-bold">＋</span>&nbsp;Add New Category
                 </div>
             </a>
         </div>

         <div class="row row-cols-1 row row-cols-md-2 row-cols-lg-3 g-4">
          @foreach ($tasks as $task)

              <!-- 目標の編集用モーダル -->
              @include('modals.edit_task')

              <!-- 目標の削除用モーダル -->
              @include('modals.delete_task')

              {{-- 目標の追加モーダル --}}
            @include('modals.add_todo')

              <div class="col">
                  <div class="card bg-light">
                      <div class="card-body d-flex justify-content-between align-items-center">
                          <h4 class="card-title ms-1 mb-0">{{ $task->title }}</h4>
                          <div class="d-flex align-items-center">
                            <a href="#" class="px-2 fs-5 fw-bold link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#addTodoModal{{ $task->id }}">＋</a>
                              <div class="dropdown">
                                  {{-- <a href="#" class="dropdown-toggle px-1 fs-5 fw-bold link-dark text-decoration-none" id="dropdownGoalMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">︙</a> --}}
                                  <a href="#" class="dropdown-toggle px-1 fs-5 fw-bold link-dark text-decoration-none menu-icon" id="dropdowntaskMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                  <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="dropdowntaskMenuLink">
                                      <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edittaskModal{{ $task->id }}">Edit</a>
                                    </li>
                                      <div class="dropdown-divider"></div>
                                      <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deletetaskModal{{ $task->id }}">Delete</a>
                                    </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                      @foreach ($task->todos()->orderBy('done', 'asc')->get() as $todo) 
                      <!-- ToDoの編集用モーダル -->
                      @include('modals.edit_todo')

                      <!-- ToDoの削除用モーダル -->
                      @include('modals.delete_todo')

                      <div class="card mx-2 mb-2">
                          <div class="card-body">
                              <div class="d-flex justify-content-between align-items-center mb-2">
                                  <h5 class="card-title ms-1 mb-0">{{ $todo->content }}</h5>
                                  <div class="dropdown">
                                      <a href="#" class="dropdown-toggle px-1 fs-5 fw-bold link-dark text-decoration-none menu-icon" id="dropdownTodoMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">︙</a>
                                      <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="dropdownTodoMenuLink">
                                          <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editTodoModal{{ $todo->id }}">Edit</a></li>
                                          <div class="dropdown-divider"></div>
                                          <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteTodoModal{{ $todo->id }}">Delete</a></li>
                                          <div class="dropdown-divider"></div>
                                          <li><a href="{{ route('tasks.todo.show', $todo->id) }}" class="dropdown-item">More Detail</a></li>
                                      </ul>
                                  </div>
                              </div>
                              <h6 class="card-subtitle ms-1 mb-1 text-muted">Date：{{ $todo->created_at->format('Y-m-d') }}</h6>
                          </div>
                      </div>
                  @endforeach
                  </div>
              </div>
          @endforeach
      </div>
    </div>
 @endsection