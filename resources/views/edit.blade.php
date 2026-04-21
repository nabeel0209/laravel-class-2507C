<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500&family=DM+Mono:wght@400&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #F8F7F4;
            color: #1a1a18;
            min-height: 100vh;
            padding: 2.5rem 1.5rem;
            display: flex;
            justify-content: center;
        }

        .container { width: 100%; max-width: 520px; }

        .page-header { margin-bottom: 2rem; }
        .page-title { font-size: 20px; font-weight: 500; letter-spacing: -0.3px; }
        .page-sub { font-size: 13px; color: #888780; margin-top: 3px; }

        .card {
            background: #fff;
            border: 0.5px solid rgba(0,0,0,0.12);
            border-radius: 12px;
            overflow: hidden;
        }

        /* Student badge */
        .student-badge {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 1rem 1.5rem;
            border-bottom: 0.5px solid rgba(0,0,0,0.08);
        }
        .avatar {
            width: 34px; height: 34px;
            border-radius: 50%;
            background: #E6F1FB; color: #0C447C;
            display: flex; align-items: center; justify-content: center;
            font-size: 11px; font-weight: 500; flex-shrink: 0;
        }
        .badge-info p { font-size: 13px; font-weight: 500; }
        .badge-info span { font-size: 11px; color: #888780; }

        /* Form fields */
        .form-body { padding: 1.5rem; }
        .field { margin-bottom: 1.1rem; }
        .field:last-child { margin-bottom: 0; }

        .form-label {
            display: block;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            color: #888780;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            height: 38px;
            border: 0.5px solid rgba(0,0,0,0.2);
            border-radius: 8px;
            padding: 0 11px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            background: #F8F7F4;
            outline: none;
            transition: border-color 0.15s, background 0.15s;
        }
        input:focus {
            border-color: rgba(0,0,0,0.4);
            background: #fff;
        }

        /* Footer */
        .form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.5rem;
            border-top: 0.5px solid rgba(0,0,0,0.08);
            background: #F8F7F4;
        }
        .btn-back {
            height: 36px; padding: 0 14px;
            background: transparent;
            border: 0.5px solid rgba(0,0,0,0.18);
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            color: #888780;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex; align-items: center; gap: 5px;
            transition: all 0.12s;
        }
        .btn-back:hover { background: #fff; color: #1a1a18; }
        .btn-update {
            height: 36px; padding: 0 18px;
            background: #1a1a18; color: #fff;
            border: none; border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px; font-weight: 500;
            cursor: pointer;
            transition: opacity 0.12s;
        }
        .btn-update:hover { opacity: 0.85; }
    </style>
</head>
<body>
<div class="container">

    <div class="page-header">
        <h1 class="page-title">Edit Student</h1>
        <p class="page-sub">Update the student's information below</p>
    </div>

    <div class="card">

        {{-- Student identity badge --}}
        <div class="student-badge">
            <div class="avatar">
                {{ strtoupper(substr($student->name, 0, 1)) }}{{ strtoupper(substr(strstr($student->name, ' '), 1, 1)) }}
            </div>
            <div class="badge-info">
                <p>{{ $student->name }}</p>
                <span>ID #{{ $student->id }} · Currently editing</span>
            </div>
        </div>

        {{-- Form --}}
        <form action="/students/update/{{ $student->id }}" method="POST">
            @csrf

            <div class="form-body">
                <div class="field">
                    <label class="form-label" for="name">Full Name</label>
                    <input type="text" id="name" name="name"
                           placeholder="Enter name"
                           value="{{ $student->name }}" required>
                </div>

                <div class="field">
                    <label class="form-label" for="age">Age</label>
                    <input type="number" id="age" name="age"
                           placeholder="Enter age" min="1" max="120"
                           value="{{ $student->age }}" required>
                </div>

                <div class="field">
                    <label class="form-label" for="nationality">Nationality</label>
                    <input type="text" id="nationality" name="nationality"
                           placeholder="Enter nationality"
                           value="{{ $student->nationality }}" required>
                </div>
            </div>

            <div class="form-footer">
                <a href="{{ url()->previous() }}" class="btn-back">← Back</a>
                <button type="submit" class="btn-update">Update Student</button>
            </div>

        </form>
    </div>

</div>
</body>
</html>