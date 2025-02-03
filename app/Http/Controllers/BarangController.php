<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $query = Barang::query();

        if ($request->has('search')) {
            $query->where('nama_barang', 'like', '%' . $request->search . '%');
        }

        if ($request->has('status')) {
            $query->where('status_barang', $request->status);
        }

        if ($request->has('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $semuabarang = $query->paginate(10)->appends($request->query());
        return view('semuabarang.index', compact('semuabarang'));
    }

    public function edit($id)
    {
        $semuabarang = Barang::findOrFail($id);
        return view('semuabarang.edit', compact('semuabarang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok_total' => 'required|integer',
            'stok_tersedia' => 'required|integer',
            'kategori' => 'required|string|max:255',
            'status_barang' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $barang = Barang::findOrFail($id);
        $data = $request->all();
        $data['diperbarui_pada'] = Carbon::now();
        $barang->update($data);

        return redirect()->route('semuabarang.index')->with('success', 'Barang telah diperbarui');
    }

    public function destroy($id)
    {
        $semuabarang = Barang::findOrFail($id);
        $semuabarang->delete();
        return redirect()->route('semuabarang.index')->with('success', 'Barang telah dihapus');
    }

    public function create()
    {
        return view('semuabarang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok_total' => 'required|integer',
            'stok_tersedia' => 'required|integer',
            'kategori' => 'required|string|max:255',
            'status_barang' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $data = $request->all();
        $data['dibuat_pada'] = Carbon::now();
        $data['diperbarui_pada'] = Carbon::now();

        Barang::create($data);

        return redirect()->route('semuabarang.index')
            ->with('success', 'Barang berhasil ditambahkan');
    }
}
