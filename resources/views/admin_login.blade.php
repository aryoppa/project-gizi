<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/img/logo_semai.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nerko+One&display=swap"
        rel="stylesheet">
    <title>SEMAI Dashboard</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="login-container">
        <div class="login-card-wrapper">
            <div class="shadow-box"></div>

            <div class="login-card">
                <div class="login-form-section">
                    <h1 class="montserrat">Welcome Admin!</h1>
                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger mb-4"
                                style="padding: 10px 15px; background-color: #f8d7da; color: #721c24; border-radius: 8px; font-size: 0.9rem;">
                                {{ $errors->first('login') }}
                            </div>
                        @endif

                        <div class="mb-4">
                            <label for="username" class="montserrat">Username</label>
                            <input type="text" id="username" name="username" class="form-control montserrat"
                                required value="{{ old('username') }}">
                        </div>

                        <div class="mb-4">
                            <label for="password" class="montserrat">Password</label>
                            <input type="password" id="password" name="password" class="form-control montserrat"
                                required>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn-masuk montserrat">Masuk</button>
                        </div>
                    </form>
                </div>

                <div class="login-image-section">
                    <img src="/img/admin_login.png" alt="Login Image">
                </div>
            </div>
        </div>
    </div>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            overflow: hidden;
        }

        .login-container {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('/img/bg_admin.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .login-card-wrapper {
            position: relative;
        }

        .shadow-box {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: #FF821C;
            border-radius: 15px;
            top: 25px;
            right: 30px;
            z-index: 1;
        }

        .login-card {
            position: relative;
            z-index: 2;
            background-color: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            display: flex;
            width: 900px;
            min-height: 500px;
        }

        .login-form-section {
            flex: 1;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-form-section h1 {
            font-size: 2.2rem;
            font-weight: 700;
            color: #000;
            margin-bottom: 40px;
            font-style: italic;
        }

        .login-form-section label {
            display: block;
            font-size: 0.95rem;
            font-weight: 500;
            color: #000;
            margin-bottom: 10px;
            font-style: italic;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #287BBF;
            box-shadow: 0 0 0 3px rgba(40, 123, 191, 0.1);
        }

        .btn-masuk {
            background-color: #287BBF;
            color: #fff;
            padding: 12px 40px;
            border: none;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-masuk:hover {
            background-color: #1f6aa5;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(40, 123, 191, 0.3);
        }

        .login-image-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 30px 0 0;
        }

        .login-image-section img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        @media (max-width: 768px) {
            .login-card {
                flex-direction: column;
                width: 90%;
                margin: 20px;
            }

            .login-card-wrapper {
                width: 90%;
            }

            .login-form-section {
                padding: 40px 30px;
            }

            .login-form-section h1 {
                font-size: 1.8rem;
            }

            .login-image-section {
                min-height: 200px;
                border-radius: 0 0 30px 30px;
            }

            .shadow-box {
                top: 10px;
                left: 10px;
            }
        }
    </style>
</body>

</html>
