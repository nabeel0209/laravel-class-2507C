<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500&family=DM+Mono:wght@400&display=swap"
        rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #F8F7F4;
            color: #1a1a18;
            min-height: 100vh;
            padding: 2.5rem 1.5rem;
        }

        .container {
            max-width: 860px;
            margin: 0 auto;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 20px;
            font-weight: 500;
            letter-spacing: -0.3px;
        }

        .page-sub {
            font-size: 13px;
            color: #888780;
            margin-top: 3px;
        }

        .card {
            background: #fff;
            border: 0.5px solid rgba(0, 0, 0, 0.12);
            border-radius: 12px;
            overflow: hidden;
        }

        /* Form */
        .form-section {
            padding: 1.25rem 1.5rem;
            border-bottom: 0.5px solid rgba(0, 0, 0, 0.08);
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 80px 1fr auto;
            gap: 10px;
            align-items: end;
        }

        .form-label {
            display: block;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            color: #888780;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            height: 36px;
            border: 0.5px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            padding: 0 10px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            background: #F8F7F4;
            outline: none;
            transition: border-color 0.15s, background 0.15s;
        }

        input:focus {
            border-color: rgba(0, 0, 0, 0.4);
            background: #fff;
        }

        .btn-submit {
            height: 36px;
            padding: 0 16px;
            background: #1a1a18;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-submit:hover {
            opacity: 0.85;
        }

        /* Stats */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            padding: 1rem 1.5rem;
            border-bottom: 0.5px solid rgba(0, 0, 0, 0.08);
        }

        .stat {
            background: #F8F7F4;
            border-radius: 8px;
            padding: 0.75rem 1rem;
        }

        .stat-label {
            font-size: 11px;
            color: #888780;
            letter-spacing: 0.4px;
            text-transform: uppercase;
            font-weight: 500;
        }

        .stat-val {
            font-size: 20px;
            font-weight: 500;
            letter-spacing: -0.5px;
            margin-top: 2px;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        thead th {
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            color: #888780;
            text-align: left;
            padding: 10px 16px;
            border-bottom: 0.5px solid rgba(0, 0, 0, 0.08);
            background: #F8F7F4;
        }

        thead th:first-child {
            width: 52px;
        }

        thead th:last-child {
            width: 140px;
            text-align: right;
        }

        tbody tr {
            border-bottom: 0.5px solid rgba(0, 0, 0, 0.06);
            transition: background 0.1s;
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #F8F7F4;
        }

        td {
            padding: 11px 16px;
            font-size: 13px;
            vertical-align: middle;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .id-cell {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            color: #888780;
        }

        .name-cell {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .avatar {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: #E6F1FB;
            color: #0C447C;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: 500;
            flex-shrink: 0;
        }

        .nat-badge {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 11px;
            background: #F8F7F4;
            color: #888780;
            border: 0.5px solid rgba(0, 0, 0, 0.1);
        }

        /* Action buttons */
        .actions {
            display: flex;
            gap: 6px;
            justify-content: flex-end;
        }

        .btn-edit,
        .btn-del {
            height: 28px;
            padding: 0 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            transition: all 0.12s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }

        .btn-edit {
            background: transparent;
            border: 0.5px solid rgba(0, 0, 0, 0.18);
            color: #888780;
        }

        .btn-edit:hover {
            background: #F8F7F4;
            color: #1a1a18;
            border-color: rgba(0, 0, 0, 0.3);
        }

        .btn-del {
            background: transparent;
            border: 0.5px solid transparent;
            color: #B4B2A9;
        }

        .btn-del:hover {
            background: #FCEBEB;
            border-color: #F09595;
            color: #A32D2D;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="page-header">
            <h1 class="page-title">Students</h1>
            <p class="page-sub">Manage and update student records</p>
        </div>

        <div class="card">

            {{-- Add Student Form --}}
            <div class="form-section">
                <form action="/add-students" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div>
                            <label class="form-label" for="name">Full Name</label>
                            <input type="text" id="name" name="name" placeholder="e.g. Ahmed Khan" required>
                        </div>
                        <div>
                            <label class="form-label" for="age">Age</label>
                            <input type="number" id="age" name="age" placeholder="20" min="1" max="120" required>
                        </div>
                        <div>
                            <label class="form-label" for="nationality">Nationality</label>
                            <input type="text" id="nationality" name="nationality" placeholder="e.g. Pakistani"
                                required>
                        </div>
                        <div>
                            <label class="form-label">&nbsp;</label>
                            <button type="submit" class="btn-submit">+ Add Student</button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Stats Row --}}
            <div class="stats-row">
                <div class="stat">
                    <div class="stat-label">Total</div>
                    <div class="stat-val">{{ $student->count() }}</div>
                </div>
                <div class="stat">
                    <div class="stat-label">Avg Age</div>
                    <div class="stat-val">{{ round($student->avg('age')) }}</div>
                </div>
                <div class="stat">
                    <div class="stat-label">Nationalities</div>
                    <div class="stat-val">{{ $student->unique('nationality')->count() }}</div>
                </div>
            </div>

            {{-- Table --}}
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Nationality</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($student as $s)
                        <tr>
                            <td class="id-cell">{{ $s->id }}</td>
                            <td>
                                <div class="name-cell">
                                    <div class="avatar">
                                        {{ strtoupper(substr($s->name, 0, 1)) }}{{ strtoupper(substr(strstr($s->name, ' '), 1, 1)) }}
                                    </div>
                                    {{ $s->name }}
                                </div>
                            </td>
                            <td>{{ $s->age }}</td>
                            <td><span class="nat-badge">{{ $s->nationality }}</span></td>
                            <td>
                                <div class="actions">
                                    <a href="/students/edit/{{ $s->id }}" class="btn-edit">Edit</a>
                                    <a href="/students/delete/{{ $s->id }}" class="btn-del">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align:center; padding: 2.5rem; color: #B4B2A9; font-size: 13px;">
                                No students yet — add one above.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</body>

</html>