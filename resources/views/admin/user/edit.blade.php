<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit user</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    @vite(['resources/css/app.css', 'resources/css/navbar.css', 'resources/js/app.js'])
    <style>
        #sidebar li{
            list-style-type: none;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            transition: 0.2s ease;
        }
        #sidebar li:hover{
            background-color: rgb(243 244 246);;
            opacity: 1;
            color: #000;
            font-size: 18px;
            font-weight: bold;
            border-radius: 20px 0 0 20px;
        }
    </style>
</head>

<body>
    @extends('layouts.navbar')
    @section('padding-x')
        px-[50px]
    @endsection

    <div id="container" class="flex">
        @include('layouts.sidebar_admin_dashboard')
        <div id="content" class="bg-gray-100 w-[85%] mt-[70px] ml-[15%] h-screen">
            <form action="{{ route('user.update', ['user' => $user]) }}" method="POST">
                @method('PUT')
                @csrf
                @if (session('message'))
                    <div class="alert alert-success text-red-600">
                        {{ session('message') }}
                    </div>
                @endif

                <label for="name">Name:</label><br>
                <input type="text" name="name" placeholder="Name" value="{{$user->name}}" class="w-50"><br>
                <label for="email">Email:</label><br>
                <input type="email" name="email" placeholder="Email" value="{{$user->email}}"><br>
                <label for="password">Password:</label><br>
                <input type="password" name="password" placeholder="Password" value="{{$user->password}}"><br>
                <label for="role">Role:</label><br>
                <select name="role" id="">
                    <option value="user" <?php if($user->role == 'user') echo 'selected'; ?>>User</option>
                    <option value="admin" <?php if($user->role == 'admin') echo 'selected'; ?>>Admin</option>
                </select><br>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button class="bg-red-600 text-white text-sm px-5 py-2.5 mt-2 rounded-md hover:bg-sky-700">UPDATE</button>
            </form>
        </div>
    </div>

</body>
</html>
