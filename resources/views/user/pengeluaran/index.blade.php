@extends('user.layouts.app')

@section('title', 'Data Pengeluaran')

@section('content')

<h4 class="fw-bold mb-4">Data Pengeluaran</h4>

<div class="bg-white p-4 rounded shadow-sm">

    <a href="{{ route('pengeluaran.create') }}" class="btn btn-primary mb-3">
        Tambah Pengeluaran
    </a>

    @if($pengeluaran->isEmpty())
        <p class="text-muted">Belum ada data pengeluaran.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pengeluaran as $i => $item)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>
                            <a href="{{ route('pengeluaran.edit', $item->id) }}" 
                               class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('pengeluaran.destroy', $item->id) }}" 
                                  method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    @endif

</div>

@endsection
