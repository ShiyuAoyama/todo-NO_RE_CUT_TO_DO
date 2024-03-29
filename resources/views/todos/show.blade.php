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
          <div class="col-md-8">
              <div class="card mt-3">
                  <div class="card-header">
                      <h5>タイトル： {{ $todo->task->title }}</h5>
                  </div>
                  <div class="card-body">
                  <p class="card-text">内容： {{ $todo->content }}</p>
                  <p>投稿日時：</p>
                  <a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">編集する</a> <!-- Button trigger modal -->
                  <form action='{{ route('tasks.todos.destroy', $todo->id) }}' method='post'>
                      @csrf
                      @method('DELETE')
                      <input type='submit' value='削除' class="btn btn-danger" onclick='return confirm("本当に削除しますか？");'>
                  </form>
                  </div>
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
                <button type="button" class="btn btn-primary">コメントする</button>
        </div>
      </div>
      <div class="row justify-content-center">
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
      </div>
  </div>
 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">タイトル名</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="show-custom-form">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"> タスク名</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $todo->task->title }}">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">内容</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{ $todo->content }}">
          </div>
          <button type="submit" class="btn btn-primary">提出</button>
        </form>
      </div>
    </div>
  </div>
</div>
  <footer>
    Copyright &copy; Seedkun Inc.
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>
