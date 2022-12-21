@extends("layouts.master")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Jumlah Akun</h5>
                    <p class="card-text">{{ $counterAccount }}</p>
                    <a href="{{ route('accounts.index') }}" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Jumlah Transaksi</h5>
                    <p class="card-text">{{ $counterTransaction }}</p>
                    <a href="{{ route('transactions.index') }}" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
