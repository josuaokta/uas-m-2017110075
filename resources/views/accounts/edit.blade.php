@extends("layouts.master")
@section('title', 'Edit Akun')
@section("content")
<div class="container p-5">
    <div class="d-flex items-center w-full">
        <h3>Edit Data</h3>
    </div>
    <div class="mt-5">
        <form action="/accounts/update" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $dataAccount->id }}">
            <div class="form-group">
                <label for="nama" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Masukkan nama..." id="nama" name="nama"
                    value="{{ $dataAccount->nama }}">
            </div>
            <div class="form-group mt-3">
                <label for="jenis" class="form-label">Jenis akun</label>
                <select id="jenis" name="jenis" class="form-control">
                    @if ($dataAccount->jenis === 'Personal')
                    <option value="Personal" selected>Personal</option>
                    <option value="Bisnis">Bisnis</option>
                    @else
                    <option value="Personal">Personal</option>
                    <option value="Bisnis" selected>Bisnis</option>
                    @endif
                </select>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                <a href="{{ route('accounts.index') }}" class="btn btn-sm btn-primary">Tutup</a>
            </div>
        </form>
    </div>
</div>
@endsection
