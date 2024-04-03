<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/reset.css')  }}">
    <link rel="stylesheet" href="{{ asset('/css/profile.css')  }}">
</head>

{{-- @extends('layouts.app_original')
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

        {{-- 更新ボタンでの遷移先 --}}
                <input type="submit" value="更新">

        </form>

        {{-- <a href="{{ route('tasks.index') }}" class="profile_update_button">
            更新
        </a> --}}

        {{-- 戻るボタンでの遷移先 --}}
        <a href="{{ route('tasks.index') }}" class="profile_back_button">
            戻る
        </a>
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
</html>
{{-- @endsection --}}