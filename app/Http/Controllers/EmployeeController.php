<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Menampilkan daftar pegawai
    public function index(Request $request)
    {
        $query = Employee::query();

        if ($request->has('search')) {
            $query->where(
                'nama',
                'like',
                '%' . $request->search . '%'
            )
                ->orWhere('nip', 'like', '%' . $request->search . '%');
        }

        $employees = $query->get();

        return view('employees.index', compact('employees'));
    }

    // Menampilkan halaman tambah pegawai
    public function create()
    {
        return view('employees.create');
    }

    // Menyimpan data pegawai ke database
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nip' => 'required|unique:employees,nip',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        // Mengisi nilai default untuk 'gol' jika tidak diisi
        $validated['gol'] = $validated['gol'] ?? 'Tidak Diketahui'; // Menetapkan nilai default jika kosong

        // Menyimpan data pegawai ke database
        Employee::create($validated);

        // Redirect ke halaman index setelah data disimpan
        return redirect()->route('employees.index');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'nip' => 'required|unique:employees,nip,' . $employee->id,
            // validasi lainnya sesuai kebutuhan
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Data pegawai berhasil diubah.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Data pegawai berhasil dihapus.');
    }

    public function print()
    {
        $employees = Employee::all();
        return view('employees.print', compact('employees'));
    }
}
