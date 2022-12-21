@extends("layouts.master")
@section('title', 'List Akun')
@section("content")
<div class="container p-5">
    <div class="d-flex items-center w-full">
        <h3>Kelola Akun</h3>
        <div class="ms-auto">
            <a href="/accounts/create" class="btn btn-sm btn-success">Buat baru</a>
        </div>
    </div>
    <div class="mt-5">
        <table class="table table-responsive table-striped table-bordered">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th class="text-center">Opsi</th>
            </thead>
            <tbody>
                @forelse ($accounts as $key => $item)
                <tr>
                    <td>
                        <span
                            class="text-dark text-hover-primary d-block mb-1 fs-6">{{($accounts->currentPage() - 1) * $accounts->perPage() + $loop->iteration}}</span>
                    </td>
                    <td>
                        <span class="text-dark d-block mb-1 fs-6">{{ $item->nama }}</span>
                    </td>
                    <td>
                        <span class="text-dark d-block mb-1 fs-6">{{ $item->jenis }}</span>
                    </td>
                    <td class="d-flex items-center justify-content-center gap-1">
                        <a href="/accounts/edit/{{ $item->id}}" class="btn btn-sm btn-primary mb-3">Edit</a>
                        <form method="POST" action="/accounts/delete">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}" />
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">
                        <span class="text-dark fw-bolder d-block mb-1 fs-6 text-center">Belum ada data</span>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="card-footer border-0 pt-0">
            <div class="d-flex flex-wrap justify-content-end">
                {{ $accounts->links() }}
            </div>
        </div>
    </div>
</div>

@endsection