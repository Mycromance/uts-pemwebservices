<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UTS Pem Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('biodata.index') }}">UTS Pem Web</a>
        <ul class="navbar-nav flex-row gap-3">
            <li class="nav-item"><a class="nav-link active" href="{{ route('biodata.index') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
            <li class="nav-item"><a class="nav-link" href="#">DEVIN_ZHARFAN_FAZARI</a></li>
            <li class="nav-item"><a class="nav-link disabled" href="#">24010110172</a></li>
        </ul>
    </div>
</nav>

<main class="container my-4">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</main>

<footer class="container py-4 mt-5">
    <ul class="nav justify-content-center pb-3 mb-3 border-bottom">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
    </ul>
    <p class="text-center text-body-secondary">© 2025 Dibuat Sejujurjurnya Oleh Team DEVIN_ZHARFAN_FAZARI dan LALU_RAFI_ANAYA_M Tanpa Mencotek dari Tim Lain</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>