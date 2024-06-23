<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .container {
            max-width: 600px;
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

        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            color: #495057;
            margin-bottom: 5px;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            height: 150px;
        }

        button {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
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
        <h1>Create Post 📝</h1>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div>
                <label>Title:</label>
                <input type="text" name="post_title" required>
            </div>
            <div>
                <label>Content:</label>
                <textarea name="content" required></textarea>
            </div>
            <button type="submit">Create 🚀</button>
            <a href="{{ route('home') }}" class="btn-back">Anasayfa 🏠</a>
        </form>
    </div>
</body>
</html>
