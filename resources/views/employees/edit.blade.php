@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Edit Pegawai</h2>

        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="{{ $employee->nip }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ $employee->nama }}" required>
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                            value="{{ $employee->tempat_lahir }}" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" required>{{ $employee->alamat }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                            value="{{ $employee->tgl_lahir }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="L" {{ $employee->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="P" {{ $employee->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>

                    <!-- Tambahkan form field lainnya di kolom kedua sesuai kebutuhan -->

                    <div class="form-group">
                        <label for="gol">Golongan</label>
                        <input type="text" class="form-control" id="gol" name="gol"
                            value="{{ $employee->gol }}" required>
                    </div>

                    <div class="form-group">
                        <label for="eselon">Eselon</label>
                        <input type="text" class="form-control" id="eselon" name="eselon"
                            value="{{ $employee->eselon }}" required>
                    </div>

                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan"
                            value="{{ $employee->jabatan }}" required>
                    </div>

                    <div class="form-group">
                        <label for="tempat_tugas">Tempat Tugas</label>
                        <input type="text" class="form-control" id="tempat_tugas" name="tempat_tugas"
                            value="{{ $employee->tempat_tugas }}" required>
                    </div>

                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama"
                            value="{{ $employee->agama }}" required>
                    </div>

                    <div class="form-group">
                        <label for="unit_kerja">Unit Kerja</label>
                        <input type="text" class="form-control" id="unit_kerja" name="unit_kerja"
                            value="{{ $employee->unit_kerja }}" required>
                    </div>

                    <div class="form-group">
                        <label for="no_hp">No. HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp"
                            value="{{ $employee->no_hp }}" required>
                    </div>

                    <div class="form-group">
                        <label for="npwp">NPWP</label>
                        <input type="text" class="form-control" id="npwp" name="npwp"
                            value="{{ $employee->npwp }}" required>
                    </div>
                </div>
            </div>

            <div class="form-group d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
