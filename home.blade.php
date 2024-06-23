<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Ana Sayfası</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .navbar {
            width: 100%;
            background-color: #343a40;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

        .navbar a {
            float: left;
            display: block;
            color: #ffffff;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #495057;
            color: #ffffff;
        }

        .navbar .right {
            float: right;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1, h2 {
            color: #343a40;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            background-color: #e9ecef;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        ul li strong {
            display: block;
            color: #007bff;
        }

        ul li p {
            color: #495057;
        }

        ul li a {
            color: #007bff;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
        }

        ul li a:hover {
            text-decoration: underline;
        }

        .btn-create {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-create:hover {
            background-color: #0056b3;
        }

        .auth-links {
            text-align: right;
            margin-top: 10px;
        }

        .auth-links a {
            color: #007bff;
            text-decoration: none;
            margin-left: 10px;
        }

        .auth-links a:hover {
            text-decoration: underline;
        }


        
    </style>
</head>
<body>
    <div class="navbar">
        <a href="{{ route('home') }}">Ana Sayfa</a>
        @guest
            <div class="right">
                <a href="{{ route('login') }}">Giriş Yap</a>
                <a href="{{ route('register') }}">Kayıt Ol</a>
            </div>
        @else
            <div class="right">
                <span>Hoş Geldiniz, {{ Auth::user()->name }}</span>
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Çıkış Yap</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @endguest
    </div>

    <!-- Ana İçerik -->
    <div class="container">
        <h1>Posts</h1>
        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        @if(session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif
        <ul>
            @foreach($posts as $post)
                <li>
                <strong><a href="{{ route('posts.show', $post) }}">{{ $post->post_title }}</a></strong> by {{ $post->user->name }}

                    <p>{{ $post->content }}</p>
                    @if($post->user_id == Auth::id())
                    
                        <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="delete-form" value="Delete"></innput>
                    </form>
                                @endif
                            </li>

            @endforeach
        </ul>
        <a href="{{ route('posts.create') }}" class="btn-create">Create New Post</a>
    </div>
</body>
</html>
