<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <header>
    <div class="header-left">
            <img class="logo" src="./logo.png" alt="">
        </div>
        <div class="header-right">
            <ul class="nav">
                <li><a href="#">ユーザA</a></li>
            </ul>
        </div>
  </header>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8 show-info-box">
            @if($todo->task->image)
              <img class="mt-3 show-image" src="{{ asset('storage/images/' . $todo->task->image) }}" alt="" />
            @else
              <img class=" mt-3 show-image" src="{{ asset('imgs/show-image-defo.jpg') }}" alt="" />
            @endif

              <div class="card mt-3">
                  <div class="card-header">
                      <h5>TITLE： {{ $todo->task->title }}</h5>
                  </div>
                    
                  <div class="card-body">
                    <p class="card-text">TO DO： {{ $todo->content }}</p>
                    <p class="card-subtitle">DATE UPDATED: {{ $todo->created_at->format('Y-m-d') }}</p>
                    <div class="show-content-buttom">
                       <a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">EDIT</a> <!-- Button trigger modal -->
                       <form action='{{ route('tasks.todos.destroy', $todo->id) }}' method='post'>
                           @csrf
                           @method('DELETE')
                           <input type='submit' value='DELETE' class="btn btn-danger" onclick='return confirm("Are you sure you want to delete this task?");'>  
                       </form>
                    </div>
                  </div>
              </div>
          </div>
      </div>
      <hr>
      <div class="row justify-content-center">
        @if($todo->description)
          <p>{{ $todo->description }}</p>
          <div class="col-md-8 show-description-content">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModaldesc">EDIT</button>
          </div>
        @else 
          <p>コメントする</p>
          <div class="col-md-8 show-description-bottom">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModaldesc">コメントする</button>
          </div>
        @endif
        
      </div>
      {{-- <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
          コメント一覧
            <div class="card mt-3">
                <h5 class="card-header">投稿者：Seedさん</h5>
                <div class="card-body">
                    <h5 class="card-title">投稿日時：2021/11/08</h5>
                    <p class="card-text">内容：今日のセブは快晴</p>
                </div>
            </div>
        </div>
      </div> --}}
  </div>
 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('tasks.todos.updateContent', $todo->id) }}" class="show-custom-form" enctype="multipart/form-data">
          @csrf
          @method('patch')
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"> Task</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{ $todo->task->title }}">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">To Do</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="content" value="{{ $todo->content }}">
          </div>
 
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ $todo->task->image }}" />
            @if($todo->task->image)
            <img id="previewImage" class="mt-3" src="{{ asset('storage/images/' . $todo->task->image) }}" alt="" style="width: 100%; height: 250px; object-fit: contain" />
            @else
              <img id="previewImage" class="mt-3" src="{{ asset('imgs/show-image-defo.jpg') }}" alt="" style="width: 100%; height: 250px; object-fit: contain" />
            @endif
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- end --}}

{{-- Modal description --}}
<div class="modal fade" id="exampleModaldesc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Description</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('tasks.todos.updateDescription', $todo->id) }}" class="show-custom-form">
          @csrf
          @method('patch')
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Description</label>
            <textarea rows="10" cols="50"  class="form-control" id="exampleInputPassword1" name="description">{{ $todo->description }}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- end --}}

  <div class="show-back-bottom">
    <a href="{{  route('tasks.index') }}" type="button" class="btn btn-primary" >BACK</a> 
  </div>


  <footer>
    Copyright &copy; Seedkun Inc.
  </footer>

  <script>
    document.getElementById('image').addEventListener('change', function(event) {
      console.log("test")
      var input = event.target
      var reader = new FileReader()

      reader.onload = function() {
        var dataURL = reader.result
        var img = document.getElementById('previewImage')
        img.src = dataURL
      }

      reader.readAsDataURL(input.files[0])
    })
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>
