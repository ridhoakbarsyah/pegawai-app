<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Pegawai</title>
    <style>
        /* Tambahkan style sederhana untuk cetak */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="no-print" style="text-align: right; margin-bottom: 20px;">
        <a href="{{ route('employees.print') }}" class="btn btn-secondary mb-3" target="_blank">Cetak Data Pegawai</a>
    </div>

    <h2 style="text-align: center;">Daftar Pegawai</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Golongan</th>
                <th>Eselon</th>
                <th>Jabatan</th>
                <th>Tempat Tugas</th>
                <th>Agama</th>
                <th>Unit Kerja</th>
                <th>No. HP</th>
                <th>NPWP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $employee->nip }}</td>
                    <td>{{ $employee->nama }}</td>
                    <td>{{ $employee->tempat_lahir }}</td>
                    <td>{{ $employee->alamat }}</td>
                    <td>{{ $employee->tgl_lahir }}</td>
                    <td>{{ $employee->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ $employee->golongan }}</td>
                    <td>{{ $employee->eselon }}</td>
                    <td>{{ $employee->jabatan }}</td>
                    <td>{{ $employee->tempat_tugas }}</td>
                    <td>{{ $employee->agama }}</td>
                    <td>{{ $employee->unit_kerja }}</td>
                    <td>{{ $employee->no_hp }}</td>
                    <td>{{ $employee->npwp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
