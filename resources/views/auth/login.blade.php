<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        Masuk - Tabler - Premium and Open Source dashboard
        template with responsive and high quality UI.
    </title>
    <link href="/tabler/dist/css/tabler.css?1760775496" rel="stylesheet" />
    <link href="/tabler/dist/css/tabler-flags.css?1760775496" rel="stylesheet" />
    <link href="/tabler/dist/css/tabler-socials.css?1760775496" rel="stylesheet" />
    <link href="/tabler/dist/css/tabler-payments.css?1760775496" rel="stylesheet" />
    <link href="/tabler/dist/css/tabler-vendors.css?1760775496" rel="stylesheet" />
    <link href="/tabler/dist/css/tabler-marketing.css?1760775496" rel="stylesheet" />
    <link href="/tabler/dist/css/tabler-themes.css?1760775496" rel="stylesheet" />
    <link href="/tabler/preview/css/demo.css?1760775496" rel="stylesheet" />
    <style>
        @import url("https.rsms.me/inter/inter.css");
    </style>
</head>

<body class="d-flex flex-column bg-white">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible position-absolute" role="alert">
            <div>{{ session('success') }}</div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif
    <script src="/tabler/dist/js/tabler-theme.min.js?1760775498"></script>
    <div class="row g-0 flex-fill">
        
        <div class="col-12 col-lg-6 col-xl-5 border-top-wide border-primary d-flex flex-column justify-content-center">
            
            <div class="container container-tight my-5 px-lg-5">
                <h2 class="h3 text-center mb-5">Masuk ke akun Anda</h2>
                <form action="/login" method="post" autocomplete="off" novalidate>
                    @csrf
                    <div class="mb-5">
                        <label class="form-label">Alamat Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email Anda" autocomplete="off" value="{{ old('email') }}" required />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label class="form-label">
                            Password
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password Anda"
                                autocomplete="off" required />
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">
                            Masuk
                        </button>
                    </div>
                </form>
                <div class="text-center text-secondary mt-3">
                    Belum punya akun?
                    <a href="/register" tabindex="-1">Daftar</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-7 d-none d-lg-block">
            <div class="bg-cover h-100 min-vh-100" style="background-image: url(/tabler/static/photos/bg_1.jpg)"></div>
        </div>
    </div>

    <script src="/tabler/dist/js/tabler.min.js?1760775506" defer></script>
    <script src="/tabler/preview/js/demo.min.js?1760775506" defer></script>
</body>

</html>
