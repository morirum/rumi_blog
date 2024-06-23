<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
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

        .emoji {
            font-size: 24px;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><span class="emoji">📝</span>Edit Post <span class="emoji">✏️</span></h1>
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label>Title:</label>
                <input type="text" name="post_title" value="{{ $post->post_title }}" required>
            </div>
            <div>
                <label>Content:</label>
                <textarea name="content" required>{{ $post->content }}</textarea>
            </div>
            <button type="submit">Update <span class="emoji">🚀</span></button>
        </form>
    </div>
</body>
</html>
