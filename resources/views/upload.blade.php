<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>

<body>

    <style>
        img {
            width: 500px;
            height: 300px;
        }

        #mainDiv {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
    </style>

    @if (session('success'))
        <p style="color: green">File Uploaded</p>
    @endif

    <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="fileInput" accept="image/*">
        <button type="submit">Upload</button>
    </form>

    <div id="mainDiv">

        @foreach ($files as $file)
            <img src="{{ asset('storage/' . $file) }}">

            <form action="/upload/delete" method="POST">
                @csrf
                <input type="text" name="file_path" hidden value="{{ $file }}">
                <button type="submit">Delete</button>
            </form>

        @endforeach

    </div>

</body>

</html>