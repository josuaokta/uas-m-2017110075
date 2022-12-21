@extends("layouts.master")
@section('title', 'Tambah Akun')
@section("content")
<div class="container p-5">
    <div class="d-flex items-center w-full">
        <h3>Tambah Akun</h3>
    </div>
    <div class="mt-5">
        <form action="/accounts/store" method="POST">
            @csrf
            <div class="form-group">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" placeholder="Masukkan id..." id="id" name="id" maxlength="16"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
            </div>
            <div class="form-group mt-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" placeholder="Masukkan nama akun..." id="nama" name="nama">
            </div>
            <div class="form-group mt-3">
                <label for="jenis" class="form-label">Jenis akun</label>
                <select id="jenis" name="jenis" class="form-control">
                    <option value="Personal">Personal</option>
                    <option value="Bisnis">Bisnis</option>
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
