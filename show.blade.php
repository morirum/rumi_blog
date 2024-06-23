<!DOCTYPE html>
<html>
<head>
    <title>Post Detayı</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            color: #343a40;
            text-align: center;
        }

        .post-content {
            margin-top: 20px;
            color: #495057;
            line-height: 1.6;
        }

        .btn-back {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #6c757d;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-back:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Post Detayı</h1>
        <h2>{{ $post->post_title }}</h2>
        <div class="post-content">
            {!! nl2br(e($post->content)) !!}
        </div>
        <a href="{{ route('home') }}" class="btn-back">Anasayfa 🏠</a>
    </div>
</body>
</html>
