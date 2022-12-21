@extends("layouts.master")
@section('title', 'List Transaksi')
@section("content")
<div class="container p-5">
    <div class="d-flex items-center w-full">
        <h3>Kelola Transaksi</h3>
        <div class="ms-auto">
            <a href="/transactions/create" class="btn btn-sm btn-success">Buat baru</a>
        </div>
    </div>
    <div class="mt-5">
        <table class="table table-responsive table-striped table-bordered">
            <thead>
                <th>No</th>
                <th>Kategori</th>
                <th class="text-center">Nominal</th>
                <th>Tujuan</th>
                <th>Akun</th>
                <th class="text-center">Opsi</th>
            </thead>
            <tbody>
                @forelse ($transactions as $key => $item)
                <tr>
                    <td>
                        <span
                            class="text-dark text-hover-primary d-block mb-1 fs-6">{{($transactions->currentPage() - 1) * $transactions->perPage() + $loop->iteration}}</span>
                    </td>
                    <td>
                        <span class="text-dark d-block mb-1 fs-6">{{ $item->kategori }}</span>
                    </td>
                    <td>
                        <span class="text-dark d-block mb-1 fs-6 text-center">{{ number_format($item->nominal,2,',','.') }}</span>
                    </td>
                    <td>
                        <span class="text-dark d-block mb-1 fs-6">{{ $item->tujuan }}</span>
                    </td>
                    <td>
                        <span class="text-dark d-block mb-1 fs-6">{{ $item->account->nama }}</span>
                    </td>
                    <td class="d-flex items-center justify-content-center gap-1">
                        <form method="POST" action="/transactions/delete">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}" />
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">
                        <span class="text-dark fw-bolder d-block mb-1 fs-6 text-center">Belum ada data</span>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="card-footer border-0 pt-0">
            <div class="d-flex flex-wrap justify-content-end">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>
</div>

@endsection