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
        @csrf
        <h1 class="profile_title">Your Profile</h1>
        <form action="/profile" method="POST" class="profile_input">
            <label>Your Name</label>
                <input 
                class="input"
                name="Name"
                value="{{ old('Name') }}"
                type="text">
            
            <label>email</label>
            <input 
            class="input"
            name="email"
            value="{{ old('email') }}"
            type="text">

            <label>password</label>
            <input 
            class="input"
            name="password"
            value="{{ old('password') }}"
            type="text">

        {{-- <p class="profile_name">name</p>
        <p class="profile_email">email</p>
        <p class="profile_password">password</p> --}}

        {{-- 更新ボタンでの遷移先 --}}
        <a href="{{ route('home') }}" class="profile_update_button">
            更新
        </a>

        {{-- 戻るボタンでの遷移先 --}}
        <a href="{{ route('tasks') }}" class="profile_back_button">
            戻る
        </a>

        </form>
    </div>
    
</body>
</html>
{{-- @endsection --}}