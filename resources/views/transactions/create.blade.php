@extends("layouts.master")
@section('title', 'Buat Transaksi')
@section("content")
<div class="container p-5">
    <div class="d-flex items-center w-full">
        <h3>Buat Transaksi</h3>
    </div>
    <div class="mt-5">
        <form action="/transactions/store" method="POST">
            @csrf
            <div class="form-group">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control" placeholder="Masukkan kategori..." id="kategori" name="kategori">
            </div>
            <div class="form-group mt-3">
                <label for="nominal" class="form-label">Nominal</label>
                <input type="text" class="form-control" placeholder="Masukkan nominal..." id="nominal" name="nominal"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
            </div>
            <div class="form-group mt-3">
                <label for="tujuan" class="form-label">Tujuan</label>
                <input type="text" class="form-control" placeholder="Masukkan tujuan..." id="tujuan" name="tujuan">
            </div>
            <div class="form-group mt-3">
                <label for="account_id" class="form-label">Akun</label>
                <select id="account_id" name="account_id" class="form-control">
                    @foreach($accounts as $account)
                        <option value="{{ $account->id }}">{{ $account->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                <a href="{{ route('transactions.index') }}" class="btn btn-sm btn-primary">Tutup</a>
            </div>
        </form>
    </div>
</div>
@endsection
