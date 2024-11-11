@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Pegawai</h2>

        <form action="{{ route('employees.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Pegawai..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

        <button onclick="printData()" class="btn btn-secondary mb-3">Cetak Data Pegawai</button>
        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Tambah Pegawai</a>

        <div class="table-responsive">
            <table class="table table-bordered table-sm" id="employeeTable">
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
                        <th>Aksi</th>
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
                            <td>
                                <a href="{{ route('employees.edit', $employee->id) }}"
                                    class="btn btn-warning btn-sm mr-3">Edit</a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                    style="display:inline;" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mt-2">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus data pegawai ini?');
        }

        function printData() {
            var printContents = document.getElementById('employeeTable').outerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
