<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS Josua Oktavianus S - 2017110075 | @yield('title')</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    @if (Session::get('message'))
    <div class="position-fixed" style="z-index: 11;bottom: 10px;right: 10px;">
        <div id="liveToast" class="toast show bg-success" style="padding: 0 !important" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Message</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-white">
                {{Session::get('message')}}
            </div>
        </div>
    </div>
    @endif

    @if (Session::get('error'))
    <div class="position-fixed" style="z-index: 11;bottom: 10px;right: 10px;">
        <div id="liveToast" class="toast show bg-danger" role="alert" style="padding: 0 !important"
            aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Error</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-white">
                {{Session::get('error')}}
            </div>
        </div>
    </div>
    @endif
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-2">
        <a class="navbar-brand" href="/">UAS Josua Oktavianus S</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('accounts.index') }}">Akun</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('transactions.index') }}">Transaksi</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
