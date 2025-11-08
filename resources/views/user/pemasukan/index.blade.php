@extends('user.layouts.app')

@section('title', 'Data Pemasukan')

@section('content')
<h4 class="fw-bold mb-4">Data Pemasukan</h4>

<div class="bg-white p-4 rounded shadow-sm">

    @if($pemasukan->isEmpty())
        <p class="text-muted">Belum ada data pemasukan.</p>
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
                @foreach ($pemasukan as $i => $item)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>
                            <a href="{{ route('pemasukan.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('pemasukan.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    @endif

</div>
@endsection
