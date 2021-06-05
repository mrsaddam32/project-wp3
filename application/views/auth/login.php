<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Antaris Hospital | <?= $title; ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="<?= base_url() ?>assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="<?= base_url() ?>assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="<?= base_url() ?>assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="<?= base_url() ?>assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="<?= base_url() ?>assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="<?= base_url() ?>assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/signin.css">
</head>

<body class="text-center">
    <main class="form-signin">
        <form method="POST" action="<?= base_url('auth/proses_login'); ?>">
            <img class="mb-4" src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Silahkan Login</h1>
            <div class="container">
                <?= validation_errors(); ?>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="username" id="floatingInput" placeholder="name@example.com" required autofocus>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary mb-2" type="submit">Login</button>
            <a href="<?= base_url('auth/register'); ?>">Belum memiliki akun ? silahkan register</a>
            <a href="<?= base_url('dokter/login'); ?>">Login Dokter</a>
            <p class="mt-4 mb-3 text-muted">&copy; 2021-Kelompok 1</p>
        </form>
    </main>
</body>

</html>