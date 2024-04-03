<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/reset.css')  }}">
    <link rel="stylesheet" href="{{ asset('/css/profile.css')  }}">
</head>

{{-- @extends('layouts.app')
@section('content') --}}

<title>nameのプロフィール</title>

<body class="profile_body">
    {{-- <a href="{{ route('profile') }}">Profile</a> --}}
    <div class="profile_body_content">
        
        <h1 class="profile_title">Your Profile</h1>
        <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" class="profile_input" enctype="multipart/form-data">
        {{-- <form action="{{ route('profile', $profile->id) }}" method="POST"></form> --}}
        @csrf
        @method('put')
            <label>Your Name</label><br>
                <input 
                class="input"
                name="name"
                value="{{ Auth::user()->name }}"
                type="text">
            
            <label>email</label><br>
            <input 
            class="input"
            name="email"
            value="{{ Auth::user()->email }}"
            type="email">

            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ Auth::user()->avatar }}" />
            <img id="previewImage" class="mt-3" src="{{ 'storage/images/' . Auth::user()->avatar }}" alt="" style="width: 100%; height: 250px; object-fit: contain" />


            {{-- <label>password</label><br>
            <input 
            class="input"
            name="password"
            value="{{ Auth::user()->password }}"
            type="text"> --}}

        {{-- <p class="profile_name">name</p>
        <p class="profile_email">email</p>
        <p class="profile_password">password</p> --}}

        
    <!-- モーダル用のHTML -->
    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <p>Your Profile has been Updated!</p>
      </div>
    </div>

    <!-- JavaScript -->
    <script>
    // モーダル表示用の関数
    function showModal() {
      var modal = document.getElementById("myModal");
      modal.style.display = "block";
    }

    // モーダルを閉じるための関数
    function closeModal() {
      var modal = document.getElementById("myModal");
      modal.style.display = "none";
    }

    // 更新が完了した場合にモーダルを表示
    @if (session('status'))
        showModal();
    @endif

    // モーダル内の閉じるボタンの処理
    var closeBtn = document.querySelector(".close");
    if (closeBtn) {
      closeBtn.addEventListener("click", closeModal);
    }

    // モーダル外のクリックでモーダルを閉じる
    window.onclick = function(event) {
      var modal = document.getElementById("myModal");
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
</script>

        
        
        {{-- 更新ボタンでの遷移先 --}}
        <input type="submit" value="Update" class="profile_update_button">

        </form>

        {{-- <a href="{{ route('tasks.index') }}" class="profile_update_button">
            更新
        </a> --}}

        {{-- 戻るボタンでの遷移先 --}}
        <button href="{{ route('tasks.index') }}" class="profile_back_button">
            Back
        </button>
    </div>

    
    <script>
        document.getElementById('image').addEventListener('change', function(event) {
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
    
</body>

<footer class="app_footer">
    <div>
      <p class="copyright">&copy; {{ config('app.name', 'Laravel') }} All rights reserved.</p>
    </div> 
  </footer>
{{-- @endsection --}}
</html>
