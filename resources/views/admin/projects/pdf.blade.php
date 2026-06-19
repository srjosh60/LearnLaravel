<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Projects</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 3px solid #f5c518;
            padding-bottom: 15px;
        }
        .header h2 {
            color: #1a1a2e;
            font-size: 18px;
            margin: 0;
            font-weight: 800;
        }
        .header p {
            color: #666;
            margin: 5px 0 0;
            font-size: 11px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        thead tr {
            background-color: #1a1a2e;
            color: white;
        }
        thead th {
            padding: 10px 8px;
            text-align: left;
            font-size: 11px;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }
        tbody td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            font-size: 11px;
        }
        .badge-selesai {
            background-color: #28a745;
            color: white;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 10px;
        }
        .badge-progress {
            background-color: #ffc107;
            color: #333;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 10px;
        }
        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 10px;
            color: #888;
        }
        .title-bar {
            background-color: #f5c518;
            padding: 8px 15px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .title-bar h3 {
            margin: 0;
            color: #1a1a2e;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>UNIVERSITAS PAMULANG</h2>
        <p>Program Studi Sistem Informasi</p>
        <p>Laporan Data Projects - {{ date('d F Y') }}</p>
    </div>

    <div class="title-bar">
        <h3>DATA PROJECTS</h3>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">Title</th>
                <th width="15%">Teknologi</th>
                <th width="35%">Description</th>
                <th width="10%">Status</th>
                <th width="15%">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $index => $project)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->teknologi }}</td>
                <td>{{ Str::limit($project->description, 80) }}</td>
                <td>
                    @if($project->status == 'Selesai')
                    <span class="badge-selesai">Selesai</span>
                    @else
                    <span class="badge-progress">On Progress</span>
                    @endif
                </td>
                <td>{{ $project->created_at ? $project->created_at->format('d/m/Y') : '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Total Data: {{ $projects->count() }} Project | Dicetak pada: {{ date('d/m/Y H:i') }}</p>
    </div>

</body>
</html>