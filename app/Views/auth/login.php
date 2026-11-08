
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - Aplikasi CI4</title>

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('sb-admin2/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="<?= base_url('sb-admin2/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
        }

        .login-card {
            background: #fff;
            border-radius: 18px;
            padding: 35px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.18);
        }

        .login-icon {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            background: #eef0ff;
            color: #667eea;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
            font-size: 32px;
        }

        .login-title {
            text-align: center;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
        }

        .login-subtitle {
            text-align: center;
            color: #888;
            margin-bottom: 28px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            color: #444;
            margin-bottom: 8px;
        }

        .input-group-addon {
            background: #f5f6fa;
            border-color: #ddd;
            color: #777;
            border-radius: 8px 0 0 8px;
        }

        .form-control {
            height: 45px;
            border-radius: 0 8px 8px 0;
            border-color: #ddd;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102,126,234,0.25);
        }

        .remember {
            color: #777;
            font-size: 13px;
        }

        .remember input {
            margin-right: 5px;
        }

        .btn-login {
            width: 100%;
            height: 48px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
            transition: 0.3s;
        }

        .btn-login:hover {
            opacity: 0.9;
            transform: translateY(-2px);
            color: white;
        }

        .register-link {
            text-align: center;
            margin-top: 25px;
            color: #777;
            font-size: 14px;
        }

        .register-link a {
            color: #667eea;
            font-weight: bold;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 25px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">

        <div class="login-card">

            <div class="login-icon">
                <i class="fa fa-sign-in"></i>
            </div>

            <h3 class="login-title">Selamat Datang!</h3>

            <p class="login-subtitle">
                Silakan login untuk melanjutkan
            </p>

            <!-- Pesan Error -->
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger">
                    <?= esc(session()->getFlashdata('error')) ?>
                </div>
            <?php endif; ?>

            <!-- Form Login -->
            <form action="<?= site_url('login') ?>" method="post">

                <?= csrf_field() ?>

                <div class="form-group">
                    <label>Email</label>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </span>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="Masukkan email"
                            value="<?= esc(old('email')) ?>"
                            required
                            autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label>Password</label>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-lock"></i>
                        </span>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Masukkan password"
                            required>
                    </div>
                </div>

                <div class="remember">
                    <label>
                        <input
                            type="checkbox"
                            name="remember"
                            value="1">
                        Ingat Saya
                    </label>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fa fa-sign-in"></i>
                    Login Sekarang
                </button>

            </form>

        </div>

    </div>

</body>
</html>
