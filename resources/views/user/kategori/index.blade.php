@extends('user.layouts.app')

@section('title', 'Data Kategori')

@section('content')

<h4 class="fw-bold mb-4">Data Kategori</h4>

<div class="bg-white p-4 rounded shadow-sm">

    <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">
        Tambah Kategori
    </a>

    @if($kategori->isEmpty())
        <p class="text-muted">Belum ada kategori.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Tipe</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($kategori as $i => $item)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $item->nama_kategori }}</td>
                        <td>
                            <span class="badge bg-{{ $item->tipe == 'pemasukan' ? 'success' : 'danger' }}">
                                {{ ucfirst($item->tipe) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('kategori.destroy', $item->id) }}" 
                                  method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    @endif

</div>

@endsection
