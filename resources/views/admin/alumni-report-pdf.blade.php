<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Alumni Report</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            background: white;
            padding: 30px;
        }

        .header {
            margin-bottom: 30px;
        }

        .logo {
            width: 120px;
            height: auto;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .alumni-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        .alumni-table thead tr {
            background-color: #3d8b7a;
        }

        .alumni-table th {
            color: white;
            font-weight: 600;
            text-align: left;
            padding: 12px 15px;
        }

        .alumni-table tbody tr:nth-child(odd) {
            background-color: #5aa898;
        }

        .alumni-table tbody tr:nth-child(even) {
            background-color: #4a9a8a;
        }

        .alumni-table td {
            padding: 10px 15px;
            color: white;
            font-size: 11px;
        }

        .footer {
            margin-top: 30px;
            font-size: 10px;
            color: #666;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('images/iium-logo.png') }}" alt="IIUM Logo" class="logo"
            onerror="this.style.display='none'">
    </div>

    <h1 class="title">List Alumni</h1>

    <table class="alumni-table">
        <thead>
            <tr>
                <th>Name Alumni</th>
                <th>Graduate Years</th>
                <th>State</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumni as $alumnus)
                <tr>
                    <td>{{ strtoupper($alumnus->name) }}</td>
                    <td>{{ $alumnus->graduation_year ?? '-' }}</td>
                    <td>{{ $alumnus->state ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Generated on {{ now()->format('d M Y, H:i') }} | KICT Alumni Management System
    </div>
</body>

</html>